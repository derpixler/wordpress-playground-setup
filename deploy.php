<?php
namespace Deployer;
require 'recipe/common.php';

set('default_stage', 'preview');

serverList('servers.yml');

task('deploy:preview', function() {

	$deployPath = get('deploy_path');

	writeln('<info>Deploying... to ' . $deployPath. '</info>');

});