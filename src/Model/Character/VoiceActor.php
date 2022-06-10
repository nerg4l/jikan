<?php

namespace Jikan\Model\Character;

use Jikan\Model\Common\PersonMeta;
use Jikan\Parser\Character\VoiceActorParser;

/**
 * Class VoiceActors
 *
 * @package Jikan\Model
 */
class VoiceActor
{

    /**
     * @var PersonMeta
     */
    private $person;

    /**
     * @var string
     */
    private $language;

    /**
     * @param \Jikan\Parser\Character\VoiceActorParser $parser
     *
     * @return self
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(VoiceActorParser $parser): self
    {
        $instance = new self();
        $instance->person = $parser->getPersonMeta();
        $instance->language = $parser->getLanguage();

        return $instance;
    }

    /**
     * @return PersonMeta
     */
    public function getPerson(): PersonMeta
    {
        return $this->person;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
}
