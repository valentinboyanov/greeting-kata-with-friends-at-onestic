<?php

namespace Kata\Tests;

use Kata\Greeter;
use PHPUnit\Framework\TestCase;

class GreetTest extends TestCase
{
    public function test_1_greet_class()
    {
        $this->assertInstanceOf(Greeter::class, (new Greeter()));
    }

    public function test_2_greet()
    {
        $greeter = new Greeter();

        $this->assertEquals("Hello, Bob.", $greeter->greet("Bob"));
    }

    public function test_3_can_say_hello_to_unknown()
    {
        $greeter = new Greeter();

        $this->assertEquals("Hello, my friend.", $greeter->greet(null));
    }

    public function test_4_handle_shouting()
    {
        $greeter = new Greeter();

        $this->assertEquals("HELLO PACO!", $greeter->greet('PACO'));
    }

    public function test_5_handle_two_names()
    {
        $greeter = new Greeter();

        $this->assertEquals('Hello, Paco and Paca.', $greeter->greet(['Paco', 'Paca']));
    }
}