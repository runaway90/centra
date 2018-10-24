<?php
namespace App\Models;

class GitHubClient
{

    public static $URL_BASE_GITHUB = 'https://api.github.com/';

    const GIT_HUB_TOKEN = 'git_hub_token';

    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * GitHubClient constructor.
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }


}
