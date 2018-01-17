<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewNewsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function correct_amount_of_news_items_returned() {
        $news1 = \App\News::create(['title' => 'Test One', 'description' => 'First Description', 'image_path' => 'newimageone']);
        $news2 = \App\News::create(['title' => 'Test Two', 'description' => 'Second Description', 'image_path' => 'newimagetwo']);
        $news3 = \App\News::create(['title' => 'Test Three', 'description' => 'Third Description', 'image_path' => 'newimagethree']);

        $records = \App\News::all();

        $this->assertEquals(3, Count($records));
    }

}
