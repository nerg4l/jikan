<?php

namespace Jikan\Request\Producer;

use Jikan\Request\RequestInterface;

/**
 * Class ProducersRequest
 *
 * @package Jikan\Request
 */
class ProducersRequest implements RequestInterface
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        return 'https://myanimelist.net/anime/producer';
    }
}
