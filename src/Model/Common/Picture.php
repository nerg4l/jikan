<?php

namespace Jikan\Model\Common;

use Jikan\Parser\Common\PictureParser;

/**
 * Class Picture
 *
 * @package Jikan\Model
 */
class Picture
{
    /**
     * @var string
     */
    private $imageUrl;

    /**
     * @var string
     */
    private $largeImageUrl;

    /**
     * @param \Jikan\Parser\Common\PictureParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     */
    public static function fromParser(PictureParser $parser): self
    {
        $instance = new self();
        $instance->largeImageUrl = $parser->getLarge();
        $instance->imageUrl = $parser->getSmall();

        return $instance;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return string
     */
    public function getLargeImageUrl(): string
    {
        return $this->largeImageUrl;
    }
}
