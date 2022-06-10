<?php

namespace Jikan\Model\User;

use Jikan\Parser\User\Profile\LastUpdatesParser;

class LastUpdates
{
    /**
     * @var \Jikan\Model\User\LastAnimeUpdate[]
     */
    private $anime;

    /**
     * @var \Jikan\Model\User\LastMangaUpdate[]
     */
    private $manga;

    public static function fromParser(LastUpdatesParser $parser): self
    {
        $instance = new self();
        $instance->anime = $parser->getLastAnimeUpdates();
        $instance->manga = $parser->getLastMangaUpdates();
        return $instance;
    }

    /**
     * @return \Jikan\Model\User\LastAnimeUpdate[]
     */
    public function getAnime(): array
    {
        return $this->anime;
    }

    /**
     * @return \Jikan\Model\User\LastMangaUpdate[]
     */
    public function getManga(): array
    {
        return $this->manga;
    }
}
