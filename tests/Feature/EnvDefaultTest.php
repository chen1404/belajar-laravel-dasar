<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvDefaultTest extends TestCase
{
    function testDefEnv() {
        $author = env("Youtube", "Koding Indonesia");
        
        self::assertEquals("Koding Indonesia", $author  );
    }
    
}
