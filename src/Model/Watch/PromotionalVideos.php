<?php

namespace Jikan\Model\Watch;

use Jikan\Model\Common\Collection\Pagination;
use Jikan\Model\Common\Collection\Results;
use Jikan\Parser\Watch\WatchPromotionalVideosParser;

/**
 * Class PromotionalVideos
 *
 * @package Jikan\Model
 */
class PromotionalVideos extends Results implements Pagination
{
    /**
     * @var string
     */
    private $hasNextPage = false;

    /**
     * @var string
     */
    private $lastVisiblePage = 1;

    /**
     * @param \Jikan\Parser\Watch\WatchPromotionalVideosParser $parser
     *
     * @return self
     * @throws \Exception
     */
    public static function fromParser(WatchPromotionalVideosParser $parser): self
    {
        $instance = new self();
        $instance->results = $parser->getResults();
        $instance->hasNextPage = $parser->getHasNextPage();
        $instance->lastVisiblePage = $parser->getLastVisiblePage();

        return $instance;
    }

    /**
     * @return bool
     */
    public function hasNextPage(): bool
    {
        return $this->hasNextPage;
    }

    /**
     * @return int|null
     */
    public function getLastVisiblePage(): ?int
    {
        return $this->lastVisiblePage;
    }

    /**
     * @return \Jikan\Model\Watch\PromotionalVideoListItem[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
