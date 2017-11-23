<?php

namespace DavaHome\GithubApi\Result;

use DavaHome\GithubApi\Client;

abstract class AbstractResult implements ResultInterface
{
    /** @var Client */
    protected $client;

    /** @var ResultInterface|null */
    protected $parentResult;

    /** @var array */
    protected $rawResult;

    /**
     * @param Client               $client
     * @param ResultInterface|null $parentResult
     */
    public function __construct(Client $client, ResultInterface $parentResult = null)
    {
        $this->client = $client;
        $this->parentResult = $parentResult;
    }

    /**
     * @return array
     */
    public function getRawResult()
    {
        return $this->rawResult;
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @return ResultInterface|null
     */
    protected function getParentResult()
    {
        return $this->parentResult;
    }
}
