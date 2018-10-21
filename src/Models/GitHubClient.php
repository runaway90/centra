<?php
namespace App\Models;

class GitHubClient
{
    public static $URL_AUTHORIZATION = 'https://github.com/login/oauth/authorize';
    public static $URL_TOKEN = 'https://github.com/login/oauth/access_token';
    public static $URL_BASE_GITHUB = 'https://api.github.com/';

    const GIT_HUB_TOKEN = 'git_hub_token';

    protected $clientId;
    protected $clientSecret;

    /**
     * GitHubClient constructor.
     * @param $clientId
     * @param $clientSecret
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getClientId()
    {
        return $this->clientId;
    }


}
