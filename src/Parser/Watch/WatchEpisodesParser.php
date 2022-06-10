<?php

namespace Jikan\Parser\Watch;

use Jikan\Model\Watch\EpisodeListItem;
use Jikan\Model\Watch\Episodes;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class WatchEpisodesParser
 *
 * @package Jikan\Parser
 */
class WatchEpisodesParser
{
    /**
     * @var Crawler
     */
    private $crawler;

    /**
     * WatchEpisodesParser constructor.
     *
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    public function getModel(): Episodes
    {
        return Episodes::fromParser($this);
    }

    public function getResults() : array
    {
        $node = $this->crawler->filterXPath(
            '//*[@id="content"]/div[3]/div/div[contains(@class, "video-list-outer-vertical")]
        '
        );

        if (!$node->count()) {
            return [];
        }

        return $node->each(function (Crawler $crawler) {
            return EpisodeListItem::fromParser(new EpisodeListItemParser($crawler));
        });
    }
}
