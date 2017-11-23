<?php

namespace DavaHome\GithubApi\Result;

use DavaHome\GithubApi\Client;

interface ResultInterface
{
    /**
     * @param Client               $client
     * @param ResultInterface|null $parentResult
     */
    public function __construct(Client $client, ResultInterface $parentResult = null);

    /**
     * Return the raw api result
     *
     * @return array
     */
    public function getRawResult();

    /**
     * @return ResultInterface
     */
    public function init();
}
