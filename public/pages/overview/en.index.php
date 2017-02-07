<h1>Summary statistics for cloud:</h1>

<table class="tfill">
	<thead>
		<tr>
			<td width="200">Item</td><td width="200">Value</td>
		</tr>
	</thead>
	<tbody>
		<tr><td>Num of nodes:</td><td id="num-nodes"></td></tr>
		<tr><td>Online nodes:</td><td id="online-nodes"></td></tr>
		<tr><td>Offline nodes:</td><td id="offline-nodes"></td></tr>
		<tr><td>Num of jails:</td><td id="num-jails"></td></tr>
		<tr><td>Num of cores:</td><td id="num-cores"></td></tr>
		<tr><td>Average freq. Mhz:</td><td id="average"></td></tr>
		<tr><td>Summary RAM:</td><td id="sum-ram"></td></tr>
		<tr><td>Summary Storage:</td><td id="sum-storage"></td></tr>
	</tbody>
	<tbody class="error" style="display:none;">
		<tr><td colspan="2" class="error_message">Unable to fetch net info!</td></tr>
	</tbody>
</table>
<p>It is an open source and free product which powered by other project (major importance list):</p>
<ul>
	<li><a href="https://www.bsdstore.ru/" target="_blank">CBSD Project</a> — FreeBSD OS virtual environment management framework</li>
	<li><a href="https://www.freebsd.org/" target="_blank">FreeBSD Project</a> — FreeBSD  is a free and open source Unix-like operating system descended from Research Unix created in <a href="https://en.wikipedia.org/wiki/Berkeley_Software_Distribution">University of California, Berkeley, U.S.</a></li>
	<li><a href="https://puppet.com/" target="_blank">Puppet</a> — Puppet is an open-source configuration management tool.</li>
	<li>and many other..</li>
</ul>
<?php


return;
echo '<pre>';
print_r($wd->getHello());

return;

function fetch_node_inv($dbfilepath)
{
	global $allncpu, $allcpufreq, $allphysmem, $allnodes, $nodetable, $alljails, $knownfreq, $workdir;

	$stat = file_exists($dbfilepath);

	if (!$stat) {
		$nodetable .= "<tr><td bgcolor=\"#CCFFCC\">$allnodes</td><td colspan=10><center>$dbfilepath not found</center></td></tr>";
		return 0;
	}

	$db = new SQLite3($dbfilepath); $db->busyTimeout(5000);
	$results = $db->query('SELECT COUNT(*) FROM jails;');

	if (!($results instanceof Sqlite3Result)) {
		$numjails=0;
	} else {
		while ($row = $results->fetchArray()) {
		$numjails=$row[0];
		}
	}

	$gwinfo="";

	$netres = $db->query('SELECT ip4,ip6,mask4,mask6 FROM net;');

	if (!($netres instanceof Sqlite3Result)) {
		echo "Error: $dbfilepath";
		$gwinfo="unable to fetch net info";
	} else {
		while ($row = $netres->fetchArray()) {
			for ($i=0;$i<4;$i++)
				if (isset($row[$i])) $gwinfo.= $row[$i]." ";
		}
	}

	$netres = $db->query('select * from gw;');

	if (!($netres instanceof Sqlite3Result)) {
	} else {
		while ($row = $netres->fetchArray()) {
			for ($i=0;$i<4;$i++)
				if (isset($row[$i])) $gwinfo.= $row[$i]." ";
		}
	}

	$results = $db->query('SELECT nodename,nodeip,fs,ncpu,physmem,cpufreq,osrelease FROM local;');
	if (!($results instanceof Sqlite3Result)) {
		$nodetable .=<<<EOF
		<tr>
			<td bgcolor="#CCFFCC">$allnodes</td><td colspan=10></td>
		</tr>
EOF;
	} else {
		while ($row = $results->fetchArray()) {
			list($nodename, $nodeip, $fs, $ncpu, $physmem, $cpufreq, $osrelease) = $row;
			$descrfile=$workdir."/var/db/nodedescr/".$nodename.".descr";
			$desc="";
			if (file_exists($descrfile)) {
				$fp = fopen($descrfile, "r");
				$size = filesize($descrfile);
				if ($size>0)
					$desc = fread($fp, filesize($descrfile));
					fclose($fp);
			}

			$locfile=$workdir."/var/db/nodedescr/".$nodename.".location";
			$loc="";

			if (file_exists($locfile)) {
				$fp = fopen($locfile, "r");
				$size = filesize($locfile);
				if ($size>0) 
					$loc = fread($fp, filesize($locfile));
				fclose($fp);
			}

			$notesfile=$workdir."/var/db/nodedescr/".$nodename.".notes";
			$notes="";

			if (file_exists($notesfile)) {
				$fp = fopen($notesfile, "r");
				$size = filesize($notesfile);
				if ($size>0)
					$notes = fread($fp, filesize($notesfile));
				fclose($fp);
			}

			$nodetable .=<<<EOF
			<tr rel="{$nodename}">
				<td bgcolor="#CCFFCC" class="node-name" data-file="descr" data-type="text">$nodename</td>
				<td data-togle="toolkip" title="$gwinfo">$nodeip</td>
				<td class="edited" data-file="descr" data-type="textarea">$desc</td>
				<td class="edited" data-file="location" data-type="text">$loc</td>
				<td>$osrelease</td>
				<td>$fs</td>
				<td>$physmem</td>
				<td>$ncpu</td>
				<td>$cpufreq</td>
				<td>$numjails</td>
				<td class="edited" data-file="notes" data-type="textarea">$notes</td>
			</tr>
EOF;
		$allncpu+=$ncpu;
		$allphysmem+=$physmem;
		$allcpufreq+=$cpufreq;
		$alljails+=$numjails;
		if ($cpufreq>1) $knownfreq++;
	}
    }
$db->close();
}


function show_overview($workdir)
{
	global $allncpu, $allcpufreq, $allphysmem, $allnodes, $nodetable, $alljails, $knownfreq, $workdir;
	echo "<strong>Summary statistics for cloud:</strong>";

$allncpu=0;
$allcpufreq=0;
$allphysmem=0;
$allnodes=0;
$nodetable="";
$alljails=0;
$knownfreq=0;
$offlinenodes=0;

$db = new SQLite3("$workdir/var/db/nodes.sqlite"); $db->busyTimeout(5000);
$sql = "SELECT nodename,ip FROM nodelist";
$result = $db->query($sql);//->fetchArray(SQLITE3_ASSOC);
$row = array();
$i = 0;

while($res = $result->fetchArray(SQLITE3_ASSOC)){
	if(!isset($res['nodename'])) continue;
	$nodename = $res['nodename'];
	$nodeip = $res['ip'];
	++$allnodes;
	$path=$workdir."/var/db/";
	$postfix=".sqlite";
	$dbpath=$path.chop($nodename).$postfix;

	$idle=check_locktime($nodeip);

	if ( $idle == 0 ) {
		$offlinenodes++;
	}

	fetch_node_inv($dbpath);
}

fetch_node_inv($workdir."/var/db/local.sqlite");

if ( $offlinenodes == 0 ) {
	$offlinecolor="#FFFF99";
} else {
	$offlinecolor="#FF9B77";
}


if ( $knownfreq > 0 ) {
	$avgfreq=round($allcpufreq / $knownfreq);
} else {
	$avgfreq=0;
}

$outstr=<<<EOF
<table>
<tr>
	<td bgcolor="#00FF00">Num of nodes:</td><td bgcolor="#FFFF99">$allnodes</td>
</tr>
<tr>
	<td bgcolor="#00FF00">Online nodes:</td><td bgcolor="#FFFF99">$allnodes</td>
</tr>
<tr>
	<td bgcolor="$offlinecolor">Offline nodes:</td><td bgcolor="$offlinecolor">$offlinenodes</td>
</tr>
<tr>
	<td bgcolor="#00FF00">Num of jails:</td><td bgcolor="#FFFF99">$alljails</td>
</tr>
<tr>
	<td bgcolor="#00FF00">Num of core:</td><td bgcolor="#FFFF99">$allncpu</td>
</tr>
<tr>
	<td bgcolor="#00FF00">Average freq. Mhz:</td><td bgcolor="#FFFF99">$avgfreq</td>
</tr>
<tr>
	<td bgcolor="#00FF00">Summary RAM:</td><td bgcolor="#FFFF99">$allphysmem</td>
</tr>
<tr>
	<td bgcolor="#00FF00">Summary Storage:</td><td bgcolor="#FFFF99">Unknown</td>
</tr>
</table>
EOF;

echo $outstr;
}

show_overview($wd->workdir);
