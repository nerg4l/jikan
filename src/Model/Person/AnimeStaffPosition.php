<?php

namespace Jikan\Model\Person;

use Jikan\Model\Common\AnimeMeta;
use Jikan\Parser\Person\AnimeStaffPositionParser;

/**
 * Class AnimeStaffPosition
 *
 * @package Jikan\Model
 */
class AnimeStaffPosition
{
    /**
     * @var string
     */
    private $position;

    /**
     * @var AnimeMeta
     */
    private $animeMeta;

    /**
     * @param \Jikan\Parser\Person\AnimeStaffPositionParser $parser
     *
     * @return self
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(AnimeStaffPositionParser $parser): self
    {
        $instance = new self();
        $instance->position = $parser->getPosition();
        $instance->animeMeta = $parser->getAnimeMeta();

        return $instance;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return AnimeMeta
     */
    public function getAnimeMeta(): AnimeMeta
    {
        return $this->animeMeta;
    }
}
