<?php

namespace DavaHome\GithubApi;

use DavaHome\GithubApi\Result\RepositoryResult;

class Client
{
    const API_URL = 'https://api.github.com';

    /** @var GithubRequest */
    protected $request;

    public function __construct($token = '', $apiUrl = self::API_URL)
    {
        $this->request = new GithubRequest($token, $apiUrl);
    }

    /**
     * @return GithubRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param string $owner
     * @param string $repository
     *
     * @return RepositoryResult
     */
    public function getRepository($owner, $repository)
    {
        return (new RepositoryResult($this))
            ->setOwner($owner)
            ->setRepository($repository)
            ->init();
    }
}
