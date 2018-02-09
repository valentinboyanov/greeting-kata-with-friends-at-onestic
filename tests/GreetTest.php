<?php

namespace Kata\Tests;

use Kata\Greeter as Greeter;
use PHPUnit\Framework\TestCase;

class GreetTest extends TestCase
{
    /**
     * @var Greeter
     */
    private $greeter;

    public function setUp()
    {
        parent::setUp();
        $this->greeter = new Greeter();
    }

    public function test_1_greet_class()
    {
        $this->assertInstanceOf(Greeter::class, $this->greeter);
    }

    public function test_2_greet()
    {
        $this->assertEquals("Hello, Bob.", $this->greeter->greet("Bob"));
    }

    public function test_3_can_say_hello_to_unknown()
    {
        $this->assertEquals("Hello, my friend.", $this->greeter->greet(null));
    }

    public function test_4_handle_shouting()
    {
        $this->assertEquals("HELLO PACO!", $this->greeter->greet('PACO'));
    }

    public function test_5_handle_two_names()
    {
        $this->assertEquals('Hello, Paco and Paca.', $this->greeter->greet(['Paco', 'Paca']));
    }

    public function test_6_handle_three_names()
    {
        $this->assertEquals("Hello, Amy, Brian, and Charlotte.", $this->greeter->greet(["Amy", "Brian", "Charlotte"]));
    }

    public function test_7_handle_three_names_shouting_one()
    {
        $this->assertEquals("Hello, Amy and Charlotte. AND HELLO BRIAN!", $this->greeter->greet(["Amy", "BRIAN", "Charlotte"]));
    }
}
