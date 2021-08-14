<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookManagementTest extends TestCase
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

        $book = Book::first();
      //  $response->assertOk();
        $this->assertCount(1 ,Book::all());
        $response->assertRedirect($book->path());
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
       // $this->withoutExceptionHandling();
        $this->post('/books' , [
            'title' => 'cool title',
            'author'=> 'victor'
        ]);

        $book = Book::first();   // old title

        $response = $this->patch($book->path() ,[
            'title' => 'new title',
            'author'=> 'new author'
        ]);

        $this->assertEquals('new title',Book::first()->title);
        $this->assertEquals('new author',Book::first()->author);
        // fresh() : to fetch the new data
        $response->assertRedirect($book->fresh()->path());
    }


    /** @test */

     public function a_book_can_be_deleted()
     {
         $this->post('/books' , [
             'title' => 'cool title',
             'author'=> 'victor'
         ]);

         $book = Book::first();

         $this->assertCount(1 , Book::all());

         $response = $this->delete($book->path());

         $this->assertCount(0 , Book::all());

         $response->assertRedirect('/books');



     }



}
