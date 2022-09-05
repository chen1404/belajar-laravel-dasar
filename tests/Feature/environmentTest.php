<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class environmentTest extends TestCase
{
    public function testEnv()
    {
        $appName = env("Youtube", "KodingIndonesia");

        self::assertEquals("KodingIndonesia", $appName);
    }
}
