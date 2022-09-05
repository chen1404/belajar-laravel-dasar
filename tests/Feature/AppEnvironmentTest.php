<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class EnviromentTest extends TestCase
{
    public function testEnvironment()
    {
        $this->expectNotToPerformAssertions();
        if (App::environment("testing")) {
            echo "Logic in local env" . PHP_EOL;
            self::assertTrue(true);
        }
    }
}
