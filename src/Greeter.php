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

    /**
     * @param $who
     * @return string
     */
    public function greet($who): string
    {
        return sprintf($this->getSalutation($who), $this->getSaluted($who));
    }

    /**
     * @param $who
     * @return string
     */
    private function getSalutation($who): string
    {
        return ctype_upper($who) ? self::SHOUT_SALUTATION : self::SALUTATION;
    }

    /**
     * @param $who
     * @return string
     */
    private function getSaluted($who): string
    {
        if (is_array($who)) {
            $lastName = array_pop($who);
            $whoLastPart = ' and ' . $lastName;

            if (count($who) > 1) {
                $whoLastPart = ',' . $whoLastPart;
            }

            $who = implode(', ', $who);
            $who .= $whoLastPart;
        }

        return $who ?? self::UNKNOWN_FRIEND;
    }

}