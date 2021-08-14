<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookReservationTest extends TestCase
{


    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_add_to_library()
    {
       // $this->withoutExceptionHandling();
        $response = $this->post('/books' , [
            'title' => 'Cool Book Title',
            'author'=> 'Victor'
        ]);
        $response->assertOk();
        $this->assertCount(1 ,Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/books' , [
            'title' => '',
            'author'=> 'Victor'
        ]);

        $response->assertSessionHasErrors('title');
    }


    /** @test */
    public function a_author_is_required()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/books' , [
            'title' => 'cool title',
            'author'=> ''
        ]);

        $response->assertSessionHasErrors('author');
    }


    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post('/books' , [
            'title' => 'cool title',
            'author'=> 'victor'
        ]);

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id ,[
            'title' => 'new title',
            'author'=> 'new author'
        ]);

        $this->assertEquals('new title',Book::first()->title);
        $this->assertEquals('new author',Book::first()->author);
    }
}
