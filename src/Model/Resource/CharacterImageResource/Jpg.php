<?php

namespace Jikan\Model\Resource\CharacterImageResource;

/**
 * Class Jpg
 * @package Jikan\Model\Resource\CharacterImageResource
 */
class Jpg
{

    /**
     * @var string|null
     */
    private $imageUrl;

    /**
     * @param ?string $imageUrl
     * @return self
     */
    public static function factory(?string $imageUrl) : self
    {
        $instance = new self;

        $instance->imageUrl = $imageUrl;

        if ($instance->imageUrl === null) {
            return $instance;
        }

        return $instance;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }
}
