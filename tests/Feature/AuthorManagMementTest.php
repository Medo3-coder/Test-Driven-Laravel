<?php

namespace Tests\Feature;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagMementTest extends TestCase
{
    use RefreshDatabase;
    /** @test*/

    public function an_author_can_be_created()
    {
      // $this->withoutExceptionHandling();
       $this->post('/author',[
           'name' => 'Author Name',
           'dob'  => '2017/06/24'
       ]);

       /*
        * MYSQL recognises date value in either YYYY-MM-DD or YY-MM-DD format. You can use /.
        * This 24/06/2017 considered invalid. Try 2017/06/24
        * */

        $author = Author::all() ;

        $this->assertCount(1 , $author);

        $this->assertInstanceOf(Carbon::class , $author->first()->dob);

        $this->assertEquals('2017/24/06' , $author->first()->dob->format('Y/d/m'));


    }
}
