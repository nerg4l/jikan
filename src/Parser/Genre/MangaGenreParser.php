<?php

namespace Jikan\Parser\Genre;

use Jikan\Helper\JString;
use Jikan\Helper\Parser;
use Jikan\Model;
use Jikan\Parser\Common\MangaCardParser;
use Jikan\Parser\ParserInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class GenreParser
 *
 * @package Jikan\Parser
 */
class MangaGenreParser implements ParserInterface
{
    /**
     * @var Crawler
     */
    private $crawler;

    /**
     * GenreParser constructor.
     *
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @return \Jikan\Model\Genre\MangaGenre
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getModel(): Model\Genre\MangaGenre
    {
        return Model\Genre\MangaGenre::fromParser($this);
    }

    /**
     * @return \Jikan\Model\Common\MangaCard[]
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getResults(): array
    {
        return $this->crawler
            ->filter('div.seasonal-anime')
            ->each(
                function (Crawler $MangaCrawler) {
                    return (new MangaCardParser($MangaCrawler))->getModel();
                }
            );
    }

    /**
     * @return int
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getMalId(): int
    {
        return (int)preg_replace('#https://myanimelist.net(/\w+/\w+/)(\d+).*#', '$2', $this->getUrl());
    }

    /**
     * @return string
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getUrl(): string
    {
        return $this->crawler->filterXPath('//meta[@property="og:url"]')->attr('content');
    }

    /**
     * @return string
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getName(): string
    {
        return JString::cleanse(
            Parser::removeChildNodes($this->crawler->filterXPath('//span[@class=\'di-ib mt4\']'))->text()
        );
    }

    /**
     * @return int
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getCount(): int
    {
        $count = $this->crawler->filterXPath('//span[@class=\'di-ib mt4\']/span');

        if (!$count->count()) {
            return 0;
        }

        return (int)preg_replace(
            '/\D/',
            '',
            $count->text()
        );
    }

    /**
     * @return int
     * @throws \InvalidArgumentException
     */
    public function getLastPage(): int
    {
        $pages = $this->crawler
            ->filterXPath('//*[@id="content"]/div[5]/div/a[contains(@class, "link")]');

        if (!$pages->count()) {
            return 1;
        }

        $pages = $pages
            ->nextAll()
            ->last();

        if (!$pages->count()) {
            return 1;
        }

        preg_match('~\?page=(\d+)$~', $pages->attr('href'), $page);

        return $page[1];
    }

    /**
     * @return bool
     */
    public function getHasNextPage(): bool
    {
        $pages = $this->crawler
            ->filterXPath('//*[@id="content"]/div[5]/div/a[contains(@class, "link")]');

        if (!$pages->count()) {
            return false;
        }

        $pages = $pages
            ->nextAll()
            ->last()
            ->filterXPath('//a[not(contains(@class, "current"))]');

        if (!$pages->count()) {
            return false;
        }

        return true;
    }
}
