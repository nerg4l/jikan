<?php

namespace Jikan\Request\Genre;

use Jikan\Request\RequestInterface;

/**
 * Class MangaGenreRequest
 *
 * @package Jikan\Request
 */
class MangaGenresRequest implements RequestInterface
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        return 'https://myanimelist.net/manga.php';
    }
}
