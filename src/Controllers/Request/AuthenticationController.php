<?php
namespace App\Controllers;

use App\Controllers\Request\GitHubClientController;


class AuthenticationController extends GitHubClientController
{
    public function authorization($urlRoute = '/', $method = 'GET')
    {
        $auth = $this->clientGitHub();
        $urlForAuthorize = ''.$urlRoute.'?client_id='.$this->clientId.'&client_secret='.$this->clientSecret.'';
        $request = $auth->request($method, $urlForAuthorize);
        $response = json_decode($request->getBody()->getContents());

        return $response;
    }

}
