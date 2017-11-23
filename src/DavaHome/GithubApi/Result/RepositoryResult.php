<?php

namespace DavaHome\GithubApi\Result;

class RepositoryResult extends AbstractResult
{
    /** @var string */
    protected $owner;

    /** @var string */
    protected $repository;

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     *
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return string
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param string $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $result = $this->getClient()
            ->getRequest()
            ->get(sprintf('/repos/%s/%s', $this->getOwner(), $this->getRepository()));

        return $this;
    }
}
