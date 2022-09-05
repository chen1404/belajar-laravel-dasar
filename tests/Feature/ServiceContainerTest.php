<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Person;

use function PHPUnit\Framework\assertNotSame;

class ServiceContainerTest extends TestCase
{
    public function TestServiceContainer()
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo", $foo->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertNotSame($foo, $foo2);
    }

    public function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person("Satria", "Bagus");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Satria", $person1->firstName);
        self::assertEquals("Satria", $person2->firstName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Satria", "Bagus");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Satria", $person1->firstName);
        self::assertEquals("Satria", $person2->firstName);
        self::assertSame($person1, $person2);
    }

    public function testInsance()
    {
        $person = new Person("Satria", "Bagus");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Satria", $person1->firstName);
        self::assertEquals("Satria", $person2->firstName);
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
    }
}
