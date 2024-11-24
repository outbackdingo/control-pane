<?php
$lang=array(
	'Settings'=>'Paramètres',
	'Profile'=>'Profil',
	'Support'=>'Support',

	'Overview'=>'Aperçu',
		'Summary Overview'=>'Aperçu simplifié',
	'Jails containers'=>'Conteneurs Jails',
		'Jails containers control panel'=>'Panneau de contrôle des conteneurs jails',
	'Template for jail'=>'Modèle pour les jails',
		'Helpers and wizard for containers'=>'Assistant pour les conteneurs',
	'Helpers of jails'=>'Assistant pour les jails',
		'Virtual machine control panel'=>'Panneau de contrôle pour les machines virtuelles',
	'Bhyve VMs'=>'Machines virtuelles Bhyve',
		'Virtual machine control panel'=>'Panneau de contrôle pour les machines virtuelles',
	'Nodes'=>'Nodes',
		'Nodes control panel'=>'Panneau de contrôle pour les nodes',
	'VM Packages'=>'Paquetage pour les machines virtuelles',
		'Manage for virtual machine packages'=>'Gestionnaire des paquetages de machines virtuelles',
	'Virtual Private Network'=>'Réseau privé virtuel',
		'Manage for virtual private networks'=>'Gestionnaire des réseaux privés virtuels',
	'Authkeys'=>'Clefs authentification',
		'Manage for SSH auth key'=>'Gestionnaire des clefs SSH',
	'Storage Media'=>'Médias de stockage',
		'Virtual Media Manager'=>'Gestionnaire des médias virtuels',
	'Repository'=>'Dépôt',
		'Remote repository'=>'Dépôt distant',
	'FreeBSD Bases'=>'Bases FreeBSD',
		'FreeBSD bases manager'=>'Gestionnaire des bases FreeBSD',
	'FreeBSD Sources'=>'Sources FreeBSD',
		'FreeBSD sources manager'=>'Gestionnaire des sources FreeBSD',
	'Jail Marketplace'=>'Marketplace Jail',
		'Public remote containers marketplace'=>'Marketplace des conteneurs publics',
	'Bhyve Marketplace'=>'Marketplace Bhyve',
		'Public remote virtual machine marketplace'=>'Marketplace des machines virtuelles publiques',
	'TaskLog'=>'Journal des tâches',
		'System task log'=>'Journal des tâches systèmes',
	
	'Not implemented yet'=>'Implémentation non terminée',
	

	'Not Launched'=>'Pas lancé',
	'Starting'=>'Démarrage en cours',
	'Launched'=>'Lancé',
	'Creating'=>'Création en cours',
	'Created'=>'Créé',
	'Stopping'=>'Arrêt en cours',
	'Stopped'=>'Arrêté',
	'Removing'=>'Effacement en cours',
	'Exporting'=>'Export en cours',
	'Cloning'=>'Clonage en cours',
	'Cloned'=>'Clôné',
	'Restarting'=>'Relance en cours',
	'Restarted'=>'Relancé',
	'Maintenance'=>'Maintenance',
	
	'Create jail'=>'Créer une jail',
	'Edit jail'=>'Modifier une jail',
	'Jail Settings'=>'Paramètres de Jail',
	'Jail name'=>'Nom de la jail',
	'Hostname'=>'Nom du serveur',
	'available on the jail is not running'=>'Disponible quand la jail est arrêtée',
	'IP address'=>'Addresse IP',
	'Root password'=>'Mot de passe Root (optionel)',
	'Root password (again)'=>'Mot de passe Root (2eme entrée)',
	'Description'=>'Description',
	'Net Interface'=>'Interface réseau',
	'Parameters'=>'Paramètres',
	'Autostart'=>'Démarrage automatique',
	'Autostart jail at system startup'=>'Démarrage automatique la jail lors du démarrage système',
	'Base writable'=>'Base writable',
	'Virtual network stack (VIMAGE)'=>'Pile réseau virtuelle (VIMAGE)',
	'Mount'=>'Montage',
	'Enabled services'=>'Services actifs',
	'Create'=>'Créer',
	'Cancel'=>'Annuler',
	'Save'=>'Sauvegarder',
	
	'Delete'=>'Effacer',
	'Protected jail'=>'Jail protégée',
	'Open VNC'=>'Ouvrir VNC',
	'Restart jail'=>'Redémarrer jail',
	'Restart bhyve'=>'Redémarrer bhyve',

	//err_messages
	'Can not be empty. Name must begin with a letter / a-z / and not have any special symbols: -,.=%'=>'Le nom ne peut pas être vide. Il doit commencer par une lettre / a-z / et ne peut pas contenir les symboles: -,.=%',
	'This field can not be empty'=>'Ce champ ne peut pas être vide',
	'Write correct ip address, e.g: 10.0.0.2'=>'Entrez une adresse IP correcte. Par ex. : 10.0.0.2',
	'Password can not be less than 3 symbols'=>'Le mot de passe ne peut pas compter moins de 3 caractères',
	'Please retype password correctly'=>'Merci de ré-entrer un mot de passe correct',
	
	'edit'=>'éditer',
	'clone'=>'cloner',
	'export'=>'exporter',
	'helpers'=> 'assistants',
	'rename'=>'renommer',
	
	'default is'=>'le défaut est',
	
	'Create Virtual Machine'=>'Créer des machines virtuelles',
	'Create Virtual Machine from Library'=>'Obtenir une machine virtuelle de la bibliothèque',
	'Virtual Machine Settings'=>'Paramètres de la machine virtuelle',
	'Virtual Machine name'=>'Nom de la machine virtuelle',
	'VM OS profile'=>'Profile OS de la machine virtuelle',
	'Authkey'=>'Clef authentification',
	'VM CPUs'=>'Coeur vCPU',
	'VM RAM'=>'RAM',
	'VM Image size'=>'Taille image disque',
	'VNC PORT'=>'Port VNC ( 0 - automatique)',
	'VM Password'=>'Mot de passe Root',
	
	'Create Authkey'=>'Créer clef authentification',
	'Authkey name'=>'Nom de la clef authentification',
	'Authkey'=>'Clef authentification',
	
	'Open'=>'Ouvrir',
	'Close'=>'Fermer',
	'Get'=>'Obtenir',
	'Update'=>'Mettre à jour',
	
	'Updating'=>'Mise à jour en cours',
	'Version'=>'Version',
	'Version number'=>'Numéro de version (ex: 12.2, 13)',
	
	'Source'=>'Source',
	
	'@clone_warning@'=>'<strong>ATTENTION !</strong> Cloner un conteneur en fonctionnement peut entraîner une perte des données dnas les clones (ex. des environnements avec des bases de données actives). Arrêtez le conteneur pour éviter ces problèmes ou continuer si vous êtes certain de ne pas courir de risques !',
	
	'edit_title'=>'Edition',
	'delete_title'=>'Effacement',
	
	'Please, wait for initialize Virtual Machine'=>'Merci de patienter - initialisation de la VM',
	'You can click here, or wait'=>'Cliquez ici ou patientez',
	'some time'=>'quelques instants',

	'host_hostname'=>'FQDN de la Jail',
	'ip4_addr'=>'Adresse Jail IPv4 et/ou IPv6',
	'allow_mount'=>'Autoriser les utilisateurs privilégiés de la jail à monter/démonter des systèmes de fichiers',
	'allow_nullfs'=>'Autoriser les utilisateurs privilégiés de la jail à monter/démonter des systèmes de fichiers NULLFS',
	'allow_fdescfs'=>'La Jail peut monter le système de fichiers fdescfs',
	'interface'=>'Créer et enlever des IP sur les cartes réseaux automatiquement. 0 pour désactiver',
	'baserw'=>'La Jail a une copie du système de base avec accès en écriture, sans montage NULLFS',
	'mount_ports'=>'La Jail a /usr/ports /usr/ports en lecture seule',
	'astart'=>'Démarrage de la jail lors du démarrage système',
	'vnet'=>'Activer le stack réseau virtuel (VNET/VIMAGE)',
	'mount_fdescfs'=>'Monter un système de fichiers FDESCFS dans le chroot',
	'allow_tmpfs'=>'Autoriser les utilisateurs privilégiés de la jail à monter/démonter des systèmes de fichiers TMPFS',
	'allow_zfs'=>'Autoriser les utilisateurs privilégiés de la jail à monter/démonter des systèmes de fichiers ZFS',
	'protected'=>'Interdire modification ou effacement de cet environnement',
	'allow_reserved_ports'=>'Autoriser root à utiliser les ports inférieurs à 1024',
	'allow_raw_sockets'=>'Autoriser root à créer des raw sockets',
	'allow_fusefs'=>'Autoriser les utilisateurs privilégiés de la jail à monter/démonter des systèmes de fichiers fuse',
	'allow_read_msgbuf'=>'Autoriser un utilisateur sans privilèges à lire le tampon des messages du noyau',
	'allow_vmm'=>'La jail aura accès à vmm(4)',
	'allow_unprivileged_proc_debug'=>'Les processus sans privilèges peuvent utiliser les fonctions de debugging',
	
	//''=>'',
);
