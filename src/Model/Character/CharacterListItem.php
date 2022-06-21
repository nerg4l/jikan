<?php

namespace Jikan\Model\Character;

use Jikan\Model\Common\CharacterMeta;
use Jikan\Parser\Character\CharacterListItemParser;

/**
 * Class CharacterParser
 *
 * @package Jikan\Model
 */
class CharacterListItem
{
    /**
     * @var CharacterMeta
     */
    public $character;

    /**
     * @var string
     */
    public $role;

    /**
     * @var VoiceActor[]
     */
    public $voiceActors = [];

    /**
     * @param CharacterListItemParser $parser
     *
     * @return CharacterListItem
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function fromParser(CharacterListItemParser $parser): self
    {
        $instance = new self();
        $instance->voiceActors = $parser->getVoiceActors();
        $instance->character = $parser->getCharacterMeta();
        $instance->role = $parser->getRole();

        return $instance;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return CharacterMeta
     */
    public function getCharacter(): CharacterMeta
    {
        return $this->character;
    }

    /**
     * @return VoiceActor[]
     */
    public function getVoiceActors(): array
    {
        return $this->voiceActors;
    }
}
