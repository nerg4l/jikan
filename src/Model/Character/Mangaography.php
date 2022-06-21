<?php

namespace Jikan\Model\Character;

use Jikan\Model\Common\MangaMeta;
use Jikan\Model\Common\Ography;
use Jikan\Parser\Character\MangaographyParser;

/**
 * Class MangaographyParser
 *
 * @package Jikan\Model
 */
class Mangaography extends Ography
{
    /**
     * @var MangaMeta
     */
    private $manga;

    /**
     * @param \Jikan\Parser\Character\MangaographyParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     */
    public static function fromParser(MangaographyParser $parser): self
    {
        $instance = new self();

        $instance->manga = $parser->getMangaMeta();
        $instance->role = $parser->getRole();

        return $instance;
    }

    /**
     * @return MangaMeta
     */
    public function getManga(): MangaMeta
    {
        return $this->manga;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
