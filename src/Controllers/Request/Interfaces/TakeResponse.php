<?php
namespace App\Controllers\Request\Interfaces;


interface TakeResponse
{
    public function getIssuesForRepository($owner, $repositoryName);
    public function getAllIssuesByOwner($owner);
    public function getAllRepositoriesNames($owner);

}