<?php

namespace Jikan\Model\Search;

use Jikan\Model\Common\Collection\Pagination;
use Jikan\Model\Common\Collection\Results;
use Jikan\Parser;

/**
 * Class UserSearch
 *
 * @package Jikan\Model\Search\Search
 */
class UserSearch extends Results implements Pagination
{

    /**
     * @var bool
     */
    private $hasNextPage = false;

    /**
     * @var int
     */
    private $lastVisiblePage = 1;

    /**
     * @param Parser\Search\UserSearchParser $parser
     *
     * @return UserSearch
     * @throws \Exception
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(Parser\Search\UserSearchParser $parser): self
    {
        $instance = new self();

        $instance->results = $parser->getResults();
        $instance->hasNextPage = $parser->getHasNextPage();
        $instance->lastVisiblePage = $parser->getLastPage();

        return $instance;
    }

    public static function mock() : self
    {
        return new self();
    }

    /**
     * @return bool
     */
    public function hasNextPage(): bool
    {
        return $this->hasNextPage;
    }

    /**
     * @return int
     */
    public function getLastVisiblePage(): int
    {
        return $this->lastVisiblePage;
    }

    /**
     * @return \Jikan\Model\Search\UserSearchListItem[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
