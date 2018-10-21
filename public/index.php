<?php
use App\Controllers\Request\GitHubClientController;

require_once __DIR__ . '../../vendor/autoload.php';

$request = new GitHubClientController('6092c700905421477657', '0cb18dea4d62c35183166c4518f8d309f5b1c5b8');
$milestonesOfRepository = $request->getIssuesForRepository('runaway90','test4callpage');

var_dump($milestonesOfRepository);
