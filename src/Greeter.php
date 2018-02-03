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
    const UNKNOWN_FRIEND   = 'my friend';
    const SALUTATION       = "Hello, %s.";
    const SHOUT_SALUTATION = "HELLO %s!";

    public function greet($name)
    {
        return sprintf($this->getSalutation($name), $name ?? self::UNKNOWN_FRIEND);
    }

    /**
     * @param $name
     * @return string
     */
    private function getSalutation($name): string
    {
        return ctype_upper($name) ? self::SHOUT_SALUTATION : self::SALUTATION;
    }
}