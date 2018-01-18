<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Product;
use App\Tag;
use App\Http\Requests\ProductRequest;


Class ProductController extends Controller {

  public function redirect_home(){

    $products = Product::all();

    $topTags = DB::select("SELECT count(product_tag.id_tag) as nvezes, product_tag.id_tag, tag.name
                            FROM product_tag, tag
                              WHERE product_tag.id_tag = tag.id_tag
                                GROUP BY product_tag.id_tag, tag.name
                                  ORDER BY nvezes DESC LIMIT 10");

    return view('home')->with('products', $products)->with('topTags', $topTags);

  }//end redirect_home


  public function redirect_form_product(){

    $tags = Tag::all();
    return view('form_store_product')->with('tags', $tags);

  }//end redirect_form_product


  public function store_product(ProductRequest $request){

    DB::beginTransaction();
    $tags = Tag::all();

    $product = new Product();
    $product->title = $request->title;
    $product->description = $request->description;
    $product->stock = $request->stock;

    if($request->hasFile('image')){
      $file = $request->image;

      if(filesize($file) <= 5242880){
        $file->move('public', $file->getClientOriginalName());
        $product->image = $file->getClientOriginalName();
        //echo '<img src="public/' . $file->getClientOriginalName() . '" />';

        try {
          $product->save();

          $count = count($request->tags);

          for ($j=0; $j < $count; $j++) {
              DB::table('product_tag')->insert([
                ['id_product' => $product->id_product,
                 'id_tag' => $request->tags[$j]]
              ]);
          }

          DB::commit();
          $stored = true;
          return view('form_store_product')->with('stored', $stored)->with('tags', $tags);

        } catch (\Exception $e) {
          $stored = false;
          $tags = Tag::all();
          return view('form_store_product')->with('stored', $stored)->with('tags', $tags);
        }

      }//end filesize
      else{
        $filesize = false;
        $tags = Tag::all();
        return view('form_store_product')->with('filesize', $filesize)->with('tags', $tags);
      }

    }//end id has file
    else {
      $filesize = false;
      $tags = Tag::all();
      return view('form_store_product')->with('filesize', $filesize)->with('tags', $tags);
    }

  }//end store products


  public function list_products(){

    $products = Product::all();

    return view('list_products')->with('products', $products);

  }//end list_products


  public function load_product($id){

    $product = new Product();
    $product = Product::find($id);

    $tagsProduct = DB::select("SELECT tag.id_tag, tag.name
                          FROM product, product_tag, tag
                            WHERE product.id_product = product_tag.id_product
                              AND product_tag.id_tag = tag.id_tag AND product.id_product = $id");

    $tags = Tag::all();

    return view('form_update_product')->with('product', $product)->with('tags', $tags)->with('tagsProduct', $tagsProduct);

  }// end load_Product


  public function delete_product($id){

    DB::beginTransaction();

    $product = new Product();
    $product = Product::find($id);

    try {

      DB::delete("DELETE FROM `product_tag` WHERE id_product = $product->id_product");

      $product->delete();

      DB::commit();

      $products = Product::all();

      $deleted = true;
      return view('list_products')->with('products', $products)->with('deleted', $deleted);

    } catch (\Exception $e) {
      $deleted = false;
      return view('list_products')->with('products', $products)->with('deleted', $deleted);
    }

  }// end delete_Product


  public function update_store_product(ProductRequest $request){

    DB::beginTransaction();
    $tags = Tag::all();

    $product = Product::find($request->id_product);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->stock = $request->stock;

    if($request->hasFile('image')){
      $file = $request->image;

      if(filesize($file) <= 5242880){
        $file->move('public', $file->getClientOriginalName());
        $product->image = $file->getClientOriginalName();
        //echo '<img src="public/' . $file->getClientOriginalName() . '" />';
      }
      else{
        $filesize = false;
        $tags = Tag::all();
        return view('form_store_product')->with('filesize', $filesize)->with('tags', $tags);
      }
    }

      $product->save();

      $count = count($request->tags);

      DB::delete("DELETE FROM `product_tag` WHERE id_product = $product->id_product");

      for ($j=0; $j < $count; $j++) {
          DB::table('product_tag')->insert([
            ['id_product' => $product->id_product,
             'id_tag' => $request->tags[$j]]
          ]);
      }

      DB::commit();
      $stored = true;
      return view('form_store_product')->with('stored', $stored)->with('tags', $tags);

  }//end store products

}

?>
