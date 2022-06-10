<?php

namespace Jikan\Model\Producer;

use Jikan\Parser\Producer\ProducerListParser;

/**
 * Class Producer
 *
 * @package Jikan\Model
 */
class ProducerList
{

    /**
     * @var \Jikan\Model\Producer\ProducerListItem[]
     */
    public $producers = [];

    /**
     * @param \Jikan\Parser\Producer\ProducerListParser $parser
     *
     * @return self
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public static function fromParser(ProducerListParser $parser): self
    {
        $instance = new self();
        $instance->producers = $parser->getProducers();

        return $instance;
    }

    /**
     * @return \Jikan\Model\Producer\ProducerListItem[]
     */
    public function getProducers()
    {
        return $this->producers;
    }
}
