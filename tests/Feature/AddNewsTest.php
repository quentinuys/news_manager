<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddNewsTest extends TestCase
{

    /** @test */
    function user_can_add_new_news_item() {
        //$this->session();

        $response = $this->call('POST', '/addnews', [
            'title' => 'GSDH exceeds expectations',
            'description' => 'Example description.',
            'image_path' => 'image_php'
        ]);

        $this->assertDatabaseHas('news', [
            'title' => 'GSDH exceeds expectations'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));

        $this
            ->get('/')
            ->assertSee('GSDH exceeds expectations');
    }

    /** @test */
    function news_item_not_created_if_validation_fails() {
            
            $response = $this->call('POST', '/addnews', []);
            $response->assertSessionHasErrors(['title', 'description']);
    }

}
