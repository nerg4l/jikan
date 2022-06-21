<?php

namespace Jikan\Model\Top;

use Jikan\Model\Common\Collection\Pagination;
use Jikan\Model\Common\Collection\Results;
use Jikan\Parser;

/**
 * Class TopAnime
 *
 * @package Jikan\Model\Search\Search
 */
class TopAnime extends Results implements Pagination
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
     * @param Parser\Top\TopAnimeParser $parser
     *
     * @return TopAnime
     * @throws \Exception
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(Parser\Top\TopAnimeParser $parser): self
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
     * @return \Jikan\Model\Top\TopAnimeListItem[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
