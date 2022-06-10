<?php

namespace Jikan\Parser\Common;

use Jikan\Parser\ParserInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class Recommendations
 *
 * @package Jikan\Parser\Common
 */
class Recommendations implements ParserInterface
{
    /**
     * @var Crawler
     */
    private $crawler;

    /**
     * Recommendations constructor.
     *
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @return \Jikan\Model\Common\Recommendation[]
     * @throws \InvalidArgumentException
     */
    public function getModel(): array
    {
        return $this->crawler
            ->filterXPath('//div[@class="borderClass"]')
            ->each(
                function ($c) {
                    return (new Recommendation($c))->getModel();
                }
            );
    }
}
