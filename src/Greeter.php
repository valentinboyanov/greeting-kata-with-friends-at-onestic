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
        return sprintf($this->getSalutation($who), $this->getSaluted($who), $this->getSalutedToShout($who));
    }

    /**
     * @param $who
     * @return string
     */
    private function getSalutation($who): string
    {
        if ($this->areTheySeveral($who)) {
            foreach ($who as $key => $name) {
                if ($this->shouldShout($name)) {
                    return self::SALUTATION . ' AND ' . self::SHOUT_SALUTATION;
                }
            }

            return self::SALUTATION;
        }

        return $this->shouldShout($who) ? self::SHOUT_SALUTATION : self::SALUTATION;
    }

    /**
     * @param $who
     * @return string
     */
    private function getSaluted($who): string
    {
        if ($this->areTheySeveral($who)) {

            foreach ($who as $key => $name) {
                if ($this->shouldShout($name)) {
                    unset($who[$key]);
                }
            }

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


    /**
     * @param $who
     * @return string
     */
    private function getSalutedToShout($who): string
    {
        $shoutingName = '';

        if ($this->areTheySeveral($who)) {
            foreach ($who as $key => $name) {
                if ($this->shouldShout($name)) {
                    $shoutingName = $name;
                }
            }
        }

        return $shoutingName;
    }

    /**
     * @param $name
     * @return bool
     */
    private function shouldShout($name): bool
    {
        return ctype_upper($name);
    }

    /**
     * @param $who
     * @return bool
     */
    private function areTheySeveral($who): bool
    {
        return is_array($who);
    }
}