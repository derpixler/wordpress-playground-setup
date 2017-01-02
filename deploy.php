<?php
namespace Deployer;
require 'recipe/common.php';

// Configuration

set('default_stage', 'test');
set('repository', 'git@bitbucket.org:webdevmedia/myhotelshop-vm.git');
set('shared_files', []);
set('shared_dirs', []);
set('writable_dirs', []);

// Servers

server('preview', 'p366984.mittwaldserver.info')
    ->user('p366984')
    ->identityFile()
    ->set('deploy_path', '/home/www/p366984/html/deployment/preview')
	->set('base_path', '/home/www/p366984/html/preview')
	->set('sudo', FALSE)
	->set('stage', 'preview' )
	->set('DB_HOST', 'db4686.mydbserver.com' )
	->set('DB_USERNAME', 'p366984' )
	->set('DB_PASSWORD', 'usr_p366984_2' )
	->set('DB_DATABASE', 'Adivimaq%965' );

server('production', 'p366984.mittwaldserver.info')
    ->user('p366984')
    ->identityFile()
    ->set('deploy_path', '/home/www/p366984/html/deployment/public')
	->set('base_path', '/home/www/p366984/html/public')
	->set('sudo', FALSE)
	->set('stage', 'production' )
	->set('DB_HOST', 'db4686.mydbserver.com' )
	->set('DB_USERNAME', 'p366984' )
	->set('DB_PASSWORD', 'usr_p366984_1' )
	->set('DB_DATABASE', 'Adivimaq%965' );


server('test', '139.59.135.182')
    ->user('deployer')
    ->identityFile()
    ->set('deploy_path', '/var/www/deployment/')
	->set('base_path', '/var/www/public')
	->set('sudo', TRUE)
	->set('stage', 'test' )
	->set('DB_HOST', 'localhost' )
	->set('DB_USERNAME', 'wordpress' )
	->set('DB_PASSWORD', 'IKiu2eiqu1shahghievoo9teidoc5ies' )
	->set('DB_DATABASE', 'wordpress' );



#serverList('servers.yml');
desc('Show deploy msg');
task('deploy:start_info', function() {

	$deployPath = get('deploy_path');

	writeln('<info>Deploying... to ' . $deployPath. '</info>');

});

desc('Move wp-config');
task('deploy:move_wp_config', function() {

    $link = run("readlink {{deploy_path}}/current")->toString();
    $currentRelease = substr($link, 0, 1) === '/' ? $link : get('deploy_path') . '/' . $link;
	$wp_config = $currentRelease . '/assets/data/wp-config.dist.php';

	$sudo = get('sudo');

	if(  $sudo === TRUE ){
		$sudo = 'sudo ';
	}

	run( $sudo . "cp " . $currentRelease . "/assets/data/wp-config.dist.php " . get('base_path') . "/wp-config.php");

});

desc('Backup DB');
task('deploy:backup_db', function() {

	$link = run("readlink {{deploy_path}}/current")->toString();
    $currentRelease = substr($link, 0, 1) === '/' ? $link : get('deploy_path') . '/' . $link;

	$backup_dir = get('deploy_path') . 'db_backup';

	// Create the backup dir if it doesn't exist
	run( sprintf("if [ ! -d %s ]; then mkdir -p %s; fi", $backup_dir, $backup_dir ) );

    run(sprintf(
           'mysqldump -h%s -u%s -p%s %s | gzip > %s/%s.sql.gz',
		   get('DB_HOST'),
		   get('DB_USERNAME'),
		   get('DB_PASSWORD'),
		   get('DB_DATABASE'),
           $backup_dir,
           basename( $currentRelease )
       ));

});


desc('Deploy your project');
task('deploy', [
	'deploy:start_info',
    'deploy:prepare',
    'deploy:lock',
	'deploy:backup_db'
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:move_wp_config',
	'deploy:unlock',
    'cleanup',
    'success'
]);

after('deploy', 'success');

desc('Backup DB');
task('rollback', function() {

    $releases = get('releases_list');

    if (isset($releases[1])) {
        $releaseDir = "{{deploy_path}}/releases/{$releases[1]}";

        // Symlink to old release.
        run("cd {{deploy_path}} && {{bin/symlink}} $releaseDir current");

		// Remove release
        run("rm -rf {{deploy_path}}/releases/{$releases[0]}");

		$link = run("readlink {{deploy_path}}/current")->toString();
	    $currentRelease = substr($link, 0, 1) === '/' ? $link : get('deploy_path') . '/' . $link;

		$backup_dir = get('deploy_path') . 'db_backup';

	    run(sprintf(
	           'gunzip < %s/%s.sql.gz | mysql -h%s -u%s -p%s %s',
	           $backup_dir,
	           basename( $currentRelease ),
			   get('DB_HOST'),
			   get('DB_USERNAME'),
			   get('DB_PASSWORD'),
			   get('DB_DATABASE')
	       ));



        writeln("Rollback to `{$releases[1]}` release was successful.");

    } else {
        writeln("<comment>No more releases you can revert to.</comment>");
    }

} );