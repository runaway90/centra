<?php
namespace App\Controllers\Request;

use App\Controllers\AuthenticationController;
use App\Models\GitHubClient;
use App\Models\Repository;
use GuzzleHttp\Client as ClientGuzzle;

class GitHubClientController extends GitHubClient
{
    public function clientGitHub()
    {
        $client = new ClientGuzzle(['base_uri' => GitHubClient::$URL_BASE_GITHUB]);
        return $client;
    }

    protected function getMilestonesForRepository($owner, $repositoryName)
    {
        $repository =  new Repository($repositoryName);
        $urlGetRepositories = '/repos/'.$owner.'/'.$repository->getName().'/milestones';

        $request = new AuthenticationController($this->clientId, $this->clientSecret);
        $response = $request->authorization($urlGetRepositories);

        foreach ($response as $milestone){
            $repository->addMilestone($milestone);
        }

        return $repository;

    }

    protected function getAllRepositoriesNames($owner)
    {
        $urlGetRepositories = '/users/'.$owner.'/repos';

        $request = new AuthenticationController($this->clientId, $this->clientSecret);
        $response = $request->authorization($urlGetRepositories);

        $allRepositoriesNames = [];

        foreach ($response as $repository){
            $allRepositoriesNames = array_merge($allRepositoriesNames, $repository->name);
        }

        return $allRepositoriesNames;
    }

    protected function getAllMilestonesByOwner($owner)
    {
        $repositories = $this->getAllRepositoriesNames($owner);
        $allMilestonesByOwner = [];

        foreach ($repositories as $repository){
            $milestonesByRepository = $this->getMilestonesForRepository($owner, $repository->name);

            $allMilestonesByOwner = array_merge($allMilestonesByOwner, $milestonesByRepository);
        }

        return $allMilestonesByOwner;
    }

}