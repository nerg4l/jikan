<?php

namespace Jikan\Model\Magazine;

use Jikan\Parser\Magazine\MagazineListParser;

/**
 * Class Magazine
 *
 * @package Jikan\Model
 */
class MagazineList
{

    /**
     * @var \Jikan\Model\Magazine\MagazineListItem[]
     */
    public $magazines = [];

    /**
     * @param \Jikan\Parser\Magazine\MagazineListParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public static function fromParser(MagazineListParser $parser): self
    {
        $instance = new self();
        $instance->magazines = $parser->getMagazines();

        return $instance;
    }

    /**
     * @return \Jikan\Model\Magazine\MagazineListItem[]
     */
    public function getMagazines()
    {
        return $this->magazines;
    }
}
