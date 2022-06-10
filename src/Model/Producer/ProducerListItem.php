<?php

namespace Jikan\Model\Producer;

use Jikan\Parser\Producer\ProducerListItemParser;

/**
 * Class Producer
 *
 * @package Jikan\Model
 */
class ProducerListItem
{
    /**
     * @var int
     */
    private $malId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $count;

    /**
     * @param \Jikan\Parser\Producer\ProducerListItemParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public static function fromParser(ProducerListItemParser $parser): self
    {
        $instance = new self();
        $instance->malId = $parser->getMalId();
        $instance->name = $parser->getName();
        $instance->url = $parser->getUrl();
        $instance->count = $parser->getCount();

        return $instance;
    }

    /**
     * @return int
     */
    public function getMalId(): int
    {
        return $this->malId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}
