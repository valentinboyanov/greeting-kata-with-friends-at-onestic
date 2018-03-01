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
        if (is_array($who)) {
            foreach ($who as $key => $name) {
                if (ctype_upper($name)) {
                    unset($who[$key]);

                    return sprintf(
                        self::SALUTATION . ' AND ' . self::SHOUT_SALUTATION,
                        $this->getSaluted($who),
                        $this->getShoutedSaluted($name)
                    );
                }
            }
        }

        return sprintf($this->getSalutation($who), $this->getSaluted($who), $this->getShoutedSaluted());
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
}