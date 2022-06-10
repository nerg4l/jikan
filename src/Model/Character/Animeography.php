<?php

namespace Jikan\Model\Character;

use Jikan\Model\Common\AnimeMeta;
use Jikan\Model\Common\Ography;
use Jikan\Parser\Character\AnimeographyParser;

/**
 * Class AnimeographyParser
 *
 * @package Jikan\Model
 */
class Animeography extends Ography
{
    /**
     * @var AnimeMeta
     */
    private $anime;

    /**
     * @param \Jikan\Parser\Character\AnimeographyParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     */
    public static function fromParser(AnimeographyParser $parser): self
    {
        $instance = new self();

        $instance->anime = $parser->getAnimeMeta();
        $instance->role = $parser->getRole();

        return $instance;
    }

    /**
     * @return AnimeMeta
     */
    public function getAnime(): AnimeMeta
    {
        return $this->anime;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
