<?php

namespace Jikan\Model\Manga;

use Jikan\Model\Common\Collection\Pagination;
use Jikan\Model\Common\Collection\Results;
use Jikan\Parser\Manga\MangaRecentlyUpdatedByUsersParser;

/**
 * Class AnimeUserUpdates
 *
 * @package Jikan\Model\Search\Search
 */
class MangaUserUpdates extends Results implements Pagination
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
     * @param \Jikan\Parser\Manga\MangaRecentlyUpdatedByUsersParser $parser
     *
     * @return MangaUserUpdates
     * @throws \Exception
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(MangaRecentlyUpdatedByUsersParser $parser): self
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
     * @return \Jikan\Model\Manga\MangaRecentlyUpdatedByUser[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
