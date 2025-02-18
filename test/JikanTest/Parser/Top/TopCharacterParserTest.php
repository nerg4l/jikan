<?php

namespace JikanTest\Parser\Top;

use Goutte\Client;
use Jikan\Model\Common\MalUrl;
use Jikan\Parser\Top\TopListItemParser;
use JikanTest\TestCase;

/**
 * Class TopCharacterParserTest
 */
class TopCharacterParserTest extends TestCase
{
    /**
     * @var \Jikan\Parser\Top\TopListItemParser
     */
    private $parser;

    public function setUp(): void
    {
        parent::setUp();

        $client = new Client($this->httpClient);
        $crawler = $client->request('GET', 'https://myanimelist.net/character.php');

        $this->parser = new TopListItemParser(
            $crawler->filterXPath('//tr[@class="ranking-list"]')->eq(2)
        );
    }

    /**
     * @test
     */
    public function it_gets_the_mal_url()
    {
        $url = $this->parser->getMalUrl();
        self::assertEquals('Lawliet, L', $url->getTitle());
        self::assertEquals('https://myanimelist.net/character/71/L_Lawliet', $url->getUrl());
    }

    /**
     * @test
     */
    public function it_gets_the_image()
    {
        self::assertEquals(
            'https://cdn.myanimelist.net/images/characters/10/249647.jpg?s=3a9db4dd560c26d3374eca98d66bcd9a',
            $this->parser->getImage()
        );
    }

    /**
     * @test
     */
    public function it_gets_the_rank()
    {
        self::assertEquals(3, $this->parser->getRank());
    }

    /**
     * @test
     */
    public function it_gets_the_character_kanji()
    {
        self::assertEquals('エル ローライト', $this->parser->getKanjiName());
    }

    /**
     * @test
     */
    public function it_gets_the_animeography()
    {
        self::assertCount(2, $this->parser->getAnimeography());
        self::assertContainsOnlyInstancesOf(MalUrl::class, $this->parser->getAnimeography());
    }

    /**
     * @test
     */
    public function it_gets_the_mangaography()
    {
        self::assertCount(3, $this->parser->getMangaography());
        self::assertContainsOnlyInstancesOf(MalUrl::class, $this->parser->getMangaography());
    }

    /**
     * @test
     */
    public function it_gets_the_favorites()
    {
        self::assertEquals(118434, $this->parser->getFavorites());
    }
}
