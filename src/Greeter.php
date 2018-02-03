<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 3/02/18
 * Time: 10:40
 */

namespace Kata;


class Greeter
{
    const UNKNOWN_FRIEND = 'my friend';

    public function greet($name)
    {
        return sprintf("Hello, %s.", $name ?? self::UNKNOWN_FRIEND);
    }
}