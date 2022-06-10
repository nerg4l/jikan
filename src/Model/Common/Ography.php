<?php

namespace Jikan\Model\Common;

/**
 * Class Ography
 *
 * @package Jikan\Model
 */
abstract class Ography
{
    /**
     * @var string
     */
    protected $role;

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
