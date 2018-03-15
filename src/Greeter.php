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
     *
     * @return string
     */
    public function greet($who): string
    {
        $format = $this->getSalutation($who);
        $argumentTwo = $this->getShoutedSaluted();

        $hasMurcian = false;
        $whoToShout = '';

        if (is_array($who)) {
            foreach ($who as $key => $name) {
                if ($this->shouldShout($name)) {
                    $hasMurcian = true;
                    unset($who[$key]);
                    $whoToShout = $name;
                }
            }
        }

        if ($hasMurcian) {
            $format = self::SALUTATION . ' AND ' . self::SHOUT_SALUTATION;
            $argumentTwo = $this->getShoutedSaluted($whoToShout);
        }

        $argumentOne = $this->getSaluted($who);

        return sprintf($format, $argumentOne, $argumentTwo);
    }

    /**
     * @param $name
     * @return string
     */
    private function getSalutation($name): string
    {
        return $this->shouldShout($name) ? self::SHOUT_SALUTATION : self::SALUTATION;
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
        $lastName     = array_pop($names);
        $formatedName = implode(', ', $names);


        if (sizeof($names) >= 2) {
            $formatedName .= ',';
        }

        $formatedName .= ' and ' . $lastName;

        return $formatedName;
    }

    private function getShoutedSaluted($name = null)
    {
        return $this->getSaluted($name);
    }

    /**
     * @param $name
     *
     * @return bool
     */
    private function shouldShout($name): bool
    {
        return ctype_upper($name);
    }
}