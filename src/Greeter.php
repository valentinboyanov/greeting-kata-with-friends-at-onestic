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
    const MINIMUM_SALUTED  = 2;
    const GLUE_COMMA       = ', ';
    const GLUE_AND         = ' and ';

    /**
     * @param $name
     * @return string
     */
    public function greet($name): string
    {
        return sprintf($this->getSalutation($name), $this->getSaluted($name));
    }

    /**
     * @param $name
     * @return string
     */
    private function getSalutation($name): string
    {
        return ctype_upper($name) ? self::SHOUT_SALUTATION : self::SALUTATION;
    }

    /**
     * @param $name
     * @return string
     */
    private function getSaluted($name): string
    {
        if (is_array($name)) {
            $name = $this->convertArraySalutedToString($name);
        }

        return $name ?? self::UNKNOWN_FRIEND;
    }

    /**
     * @param $name
     * @return string
     */
    private function convertArraySalutedToString($name): string
    {
        $glue = self::GLUE_AND;

        if (sizeof($name) > self::MINIMUM_SALUTED) {
            $name[sizeof($name) - 1] = 'and ' . $name[sizeof($name) - 1];
            $glue                    = self::GLUE_COMMA;
        }

        return $this->implodeSalutedWithSpecificGlue($glue, $name);
    }

    /**
     * @param $glue
     * @param $name
     * @return string
     */
    private function implodeSalutedWithSpecificGlue($glue, $name): string
    {
        return implode($glue, $name);
    }

}