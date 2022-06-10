<?php

namespace Jikan\Model\Manga;

use Jikan\Parser\Reviews\MangaReviewScoresParser;

/**
 * Class MangaReviewScores
 *
 * @package Jikan\Model
 */
class MangaReviewScores
{

    /**
     * @var int
     */
    private $overall;

    /**
     * @var int
     */
    private $story;

    /**
     * @var int
     */
    private $art;

    /**
     * @var int
     */
    private $character;

    /**
     * @var int
     */
    private $enjoyment;

    /**
     * @param  \Jikan\Parser\Reviews\MangaReviewScoresParser $parser
     * @return self
     */
    public static function fromParser(MangaReviewScoresParser $parser): self
    {
        $instance = new self();

        $instance->overall = $parser->getOverallScore();
        $instance->story = $parser->getStoryScore();
        $instance->art = $parser->getArtScore();
        $instance->character = $parser->getCharacterScore();
        $instance->enjoyment = $parser->getEnjoymentScore();

        return $instance;
    }

    /**
     * @return int
     */
    public function getOverall(): int
    {
        return $this->overall;
    }

    /**
     * @return int
     */
    public function getStory(): int
    {
        return $this->story;
    }

    /**
     * @return int
     */
    public function getArt(): int
    {
        return $this->art;
    }

    /**
     * @return int
     */
    public function getCharacter(): int
    {
        return $this->character;
    }

    /**
     * @return int
     */
    public function getEnjoyment(): int
    {
        return $this->enjoyment;
    }
}
