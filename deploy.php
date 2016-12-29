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
	->set('stage', 'preview' );

server('production', 'p366984.mittwaldserver.info')
    ->user('p366984')
    ->identityFile()
    ->set('deploy_path', '/home/www/p366984/html/deployment/public')
	->set('stage', 'production' );

server('test', '139.59.135.182')
    ->user('deployer')
    ->identityFile()
    ->set('deploy_path', '/var/www/deployment/')
	->set('stage', 'test' );

// Tasks


#serverList('servers.yml');
desc('Show deploy msg');
task('deploy:start_info', function() {

	$deployPath = get('deploy_path');

	writeln('<info>Deploying... to ' . $deployPath. '</info>');

});

#desc('Restart PHP-FPM service');
#task('php-fpm:restart', function () {
#    // The user must have rights for restart service
#    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
#    run('sudo systemctl restart php-fpm.service');
#});
#after('deploy:symlink', 'php-fpm:restart');

desc('Deploy your project');
task('deploy', [
	'deploy:start_info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

after('deploy', 'success');