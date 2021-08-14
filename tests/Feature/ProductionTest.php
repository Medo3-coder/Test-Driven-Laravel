<!---->
<?php
///*
//namespace Tests\Feature;
//
//
//use App\Models\Category;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Tests\TestCase;
//use App\Models\Product;
//
//class ProductionTest extends TestCase
//{
//      use RefreshDatabase ;
//
//
//    /**
//     * A basic feature test example.
//     *
//     * @return void
//     */
//
//    protected $product ;
//
//    public function setUp(): void
//    {
//        parent::setUp();
//        $this->product = Product::create([
//            'name' => 'car',
//            'price'=> 100
//        ]);
//    }
//
//    public function test_user_can_list_products()
//    {
//
//        $response = $this->get('/product');
//
//        $response->assertStatus(200)
//        ->assertSee('car');
//
//    }
//
//    public function test_user_can_see_product_details()
//    {
//        $response = $this->get('/product/' . $this->product->id);
//
//        $response->assertStatus(200)
//            ->assertSee('car')
//            ->assertSee(100);
//    }
//
//    public function test_a_product_can_belongs_to_category()
//    {
//        //arrange
//        $product = \App\Models\Product::factory()->create();
//        $category = \App\Models\Category::factory()->create();
//
//        //assert
//        $this->assertDatabaseMissing('products',[
//            'id' => $product->id ,
//            'category_id' =>$category->id
//
//        ]);
//
//      //act
//        $product->setCategory($category);
//
//
//        //assert
//        $this->assertDatabaseHas('products',[
//            'id' => $product->id ,
//            'category_id' =>$category->id
//
//        ]);
//
//    }
//
//    public  function test_it_prevent_changing_the_product_category()
//    {
//        $product = \App\Models\Product::factory()->create();
//        $category = \App\Models\Product::factory()->create();
//        $category2 = \App\Models\Category::factory()->create();
//
//        $product->setCategory($category);
//
//        $this->expectException(\Exception::class);
//        $this->expectExceptionMessage('You can not change the product category');
//
//        $product->setCategory($category2);
//    }
//
//}
//
//*/
