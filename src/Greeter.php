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
    public function greet($name)
    {
        $defSalutation = 'my friend';
        if (is_null($name)){
            $name = $defSalutation;
        }
        return sprintf("Hello, %s.", $name);
    }
}