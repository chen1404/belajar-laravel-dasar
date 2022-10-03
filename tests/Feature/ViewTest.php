<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello Satria');

        $this->get('/hello-again')
            ->assertSeeText('Hello Satria');
    }

    public function testNested()
    {
        $this->get('/hello-world')
            ->assertSeeText('World Satria');
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'Satria'])
            ->assertSeeText('Hello Satria');

        $this->view('hello.world', ['name' => 'Satria'])
            ->assertSeeText('World Satria');
    }
}
