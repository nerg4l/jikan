<?php

namespace Jikan\Model\Genre;

use Jikan\Parser\Genre\AnimeGenreListParser;

/**
 * Class AnimeGenre
 *
 * @package Jikan\Model
 */
class AnimeGenreList
{

    /**
     * @var \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public $genres = [];

    /**
     * @var \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public $explicitGenres = [];

    /**
     * @var \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public $themes = [];

    /**
     * @var \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public $demographics = [];


    /**
     * @param AnimeGenreListParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public static function fromParser(AnimeGenreListParser $parser): self
    {
        $instance = new self();

        $instance->genres = $parser->getGenres();
        $instance->explicitGenres = $parser->getExplicitGenres();
        $instance->themes = $parser->getThemes();
        $instance->demographics = $parser->getDemographics();

        return $instance;
    }

    /**
     * @return \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public function getExplicitGenres(): array
    {
        return $this->explicitGenres;
    }

    /**
     * @return \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public function getThemes(): array
    {
        return $this->themes;
    }

    /**
     * @return \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public function getDemographics(): array
    {
        return $this->demographics;
    }

    /**
     * @return \Jikan\Model\Genre\AnimeGenreListItem[]
     */
    public function getGenres()
    {
        return $this->genres;
    }
}
