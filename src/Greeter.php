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

    private $shouterNameInArray;

    /**
     * @param $name
     * @return string
     */
    public function greet($name): string
    {
        $theGreet = sprintf($this->getSalutation($name), $this->getSaluted($name));

        if ($this->shouterNameInArray != '') {
            $theGreet .= sprintf(' AND ' . self::SHOUT_SALUTATION, $this->shouterNameInArray);
        }

        return $theGreet;
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
            $name = $this->getSalutedFromArray($name);
        }

        return $name ?? self::UNKNOWN_FRIEND;
    }

    /**
     * @param $names
     *
     * @return string
     */
    private function getSalutedFromArray($names): string
    {
        foreach ($names as $key => $name) {
            if (ctype_upper($name)) {
                unset($names[$key]);
                $this->shouterNameInArray = $name;
            }
        }

        $lastName     = array_pop($names);
        $formatedName = implode(', ', $names);


        if (sizeof($names) >= 2) {
            $formatedName .= ',';
        }

        $formatedName .= ' and ' . $lastName;

        return $formatedName;
    }
}