<?php

namespace Jikan\Model\Genre;

use Jikan\Parser\Genre\MangaGenreListParser;

/**
 * Class MangaGenre
 *
 * @package Jikan\Model
 */
class MangaGenreList
{

    /**
     * @var \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public $genres = [];

    /**
     * @var \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public $explicitGenres = [];

    /**
     * @var \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public $themes = [];

    /**
     * @var \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public $demographics = [];

    /**
     * @param MangaGenreListParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public static function fromParser(MangaGenreListParser $parser): self
    {
        $instance = new self();

        $instance->genres = $parser->getGenres();
        $instance->explicitGenres = $parser->getExplicitGenres();
        $instance->themes = $parser->getThemes();
        $instance->demographics = $parser->getDemographics();

        return $instance;
    }

    /**
     * @return \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public function getExplicitGenres(): array
    {
        return $this->explicitGenres;
    }

    /**
     * @return \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public function getThemes(): array
    {
        return $this->themes;
    }

    /**
     * @return \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public function getDemographics(): array
    {
        return $this->demographics;
    }

    /**
     * @return \Jikan\Model\Genre\MangaGenreListItem[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }
}
