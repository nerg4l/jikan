<?php

namespace Jikan\Model\Reviews;

use Jikan\Model\Common\Collection\Pagination;
use Jikan\Model\Common\Collection\Results;
use Jikan\Parser;

/**
 * Class RecentReviews
 *
 * @package Jikan\Model\UserReviewsParser\RecentReviews
 */
class RecentReviews extends Results implements Pagination
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
     * @param Parser\Reviews\RecentReviewsParser $parser
     *
     * @return RecentReviews
     * @throws \Exception
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(Parser\Reviews\RecentReviewsParser $parser): self
    {
        $instance = new self();

        $instance->results = $parser->getRecentReviews();
        $instance->hasNextPage = $parser->hasNextPage();

        return $instance;
    }

    /**
     * @return static
     */
    public static function mock() : self
    {
        return new self();
    }

    /**
     * @return \Jikan\Model\Reviews\Recent\RecentAnimeReview[]|\Jikan\Model\Reviews\Recent\RecentMangaReview[]
     */
    public function getResults(): array
    {
        return $this->results;
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
}
