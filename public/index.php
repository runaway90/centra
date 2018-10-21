<?php
use App\Controllers\Request\GitHubClientController;

require_once __DIR__ . '../../vendor/autoload.php';


$req = new GitHubClientController('6092c700905421477657', '0cb18dea4d62c35183166c4518f8d309f5b1c5b8');
$repo = $req->getMilestonesForRepository('runaway90','test4callpage');

var_dump($repo);

//
//use KanbanBoard\GithubActual;
//use KanbanBoard\Utilities;
//
//require '../badway/KanbanBoard/Github.php';
//require '../badway/Utilities.php';
//require '../badway/KanbanBoard/Authentication.php';
//
//$repositories = explode('|', Utilities::env('GH_REPOSITORIES'));
//$authentication = new \KanbanBoard\Login();
//$token = $authentication->login();
//$github = new GithubClient($token, Utilities::env('GH_ACCOUNT'));
//$board = new \KanbanBoard\Application($github, $repositories, array('waiting-for-feedback'));
//$data = $board->board();
//$m = new Mustache_Engine(array(
//	'loader' => new Mustache_Loader_FilesystemLoader('../views'),
//));
//echo $m->render('index', array('milestones' => $data));
