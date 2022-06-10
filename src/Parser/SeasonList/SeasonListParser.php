<?php

namespace Jikan\Parser\SeasonList;

use Jikan\Model\SeasonList\SeasonArchive;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class SeasonListParser
 *
 * @package Jikan\Parser\SeasonList
 */
class SeasonListParser
{
    /**
     * @var Crawler
     */
    private $crawler;

    /**
     * SeasonListParser constructor.
     *
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @return SeasonArchive
     */
    public function getModel() : SeasonArchive
    {
        return SeasonArchive::fromParser($this);
    }

    /**
     * @return \Jikan\Model\SeasonList\SeasonListItem[]
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getResults(): array
    {
        return $this->crawler
            ->filterXPath('//table[contains(@class, "anime-seasonal-byseason")]//tr')
            ->each(
                function (Crawler $crawler) {
                    return (new SeasonListItemParser($crawler))->getModel();
                }
            );
    }
}
