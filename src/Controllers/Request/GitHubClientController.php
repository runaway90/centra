<?php
namespace App\Controllers\Request;

use App\Controllers\Request\Interfaces\ClientRequest;
use App\Controllers\Request\Interfaces\TakeResponse;
use App\Models\GitHubClient;
use App\Models\Repository;
use GuzzleHttp\Client as ClientGuzzle;

class GitHubClientController extends GitHubClient implements ClientRequest, TakeResponse
{

    public function startClientGitHub()
    {
        $client = new ClientGuzzle(['base_uri' => GitHubClient::$URL_BASE_GITHUB]);
        return $client;
    }

    public function getIssuesForRepository($owner, $repositoryName)
    {
        $repository = new Repository($repositoryName);
        $urlGetRepositories = '/repos/' . $owner . '/' . $repository->getName() . '/issues';

        $request = new AuthenticationController($this->clientId, $this->clientSecret);
        $response = $request->authorization($urlGetRepositories);

        foreach ($response as $issue) {
            $repository->addIssue($issue);
        }

        return $repository;

    }

    public function getAllIssuesByOwner($owner)
    {
        $repositories = $this->getAllRepositoriesNames($owner);
        $allMilestonesByOwner = [];

        foreach ($repositories as $repository){

            $milestonesByRepository = $this->getIssuesForRepository($owner, $repository);
            $allMilestonesByOwner = array_merge($allMilestonesByOwner, array($milestonesByRepository));
        }

        return $allMilestonesByOwner;
    }

    public function getAllRepositoriesNames($owner)
    {
        $urlGetRepositories = '/users/'.$owner.'/repos';

        $request = new AuthenticationController($this->clientId, $this->clientSecret);
        $response = $request->authorization($urlGetRepositories);

        $allRepositoriesNames = [];

        foreach ($response as $repository){
            $name = array($repository->name);
            $allRepositoriesNames = array_merge($allRepositoriesNames, $name);
        }

        return $allRepositoriesNames;
    }

}