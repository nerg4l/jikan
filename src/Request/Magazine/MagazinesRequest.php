<?php

namespace Jikan\Request\Magazine;

use Jikan\Request\RequestInterface;

/**
 * Class ProducersRequest
 *
 * @package Jikan\Request
 */
class MagazinesRequest implements RequestInterface
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        return 'https://myanimelist.net/manga/magazine';
    }
}
