<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product;
    public function _construct()
    {
         $this->product=new Product();
    }
    public function getByCategory($id)
    {
      $category = Category::where('id', $id)->first();
      $products = $category->load('products');
     if(!$products){
       return response()->json(['message'=>'product not found'],404);
     }
     return response()->json($products,200);
    }
    public function show($id)
    {
        $product= product::find($id);
        if(!$product){
          return response()->json(['message'=>'product not found'],404);
        }
        return response()->json($product,200);
    }

    public function GetAll()
    {
        $products= product::orderBy('created_at','DESC')->get();
        return response()->json($products,200);
    }
 
    public function store(ProductStoreRequest $request)
    {

      try{
        

        $imageName=Str::random(32).".".$request->PicturePath->getClientOriginalExtension();

        product::create([
          'Name'=>$request->Name	,
          'PicturePath'=>$imageName,
          'BarCode'=>$request->BarCode,
          'PurchasPrice'=>$request->PurchasPrice,
          'Price'=>$request->Price,
          'StockAlerte'=>$request->StockAlerte,
          'category_id'=>$request->category_id,
          'unite_of_sale_id'=>$request->unite_of_sale_id,
        ]);

        Storage::disk('public')->put($imageName,file_get_contents($request->PicturePath));
       
        return response()->json(
          ['message'=>'product added succesfully'],200
        );
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }

 

        
    }
 
  
  
    public function update(ProductStoreRequest $request,$id)
    {


      try{
        $product= product::find($id);
        if(!$product){
          return response()->json(['message'=>'product not found'],404);
        }

        $product->Name=$request->Name;
        $product->BarCode=$request->BarCode;
        $product->PurchasPrice=$request->PurchasPrice;
        $product->Price=$request->Price;
        $product->StockAlerte=$request->StockAlerte;
        $product->category_id=$request->category_id;
        $product->unite_of_sale_id=$request->unite_of_sale_id;

         if($request->PicturePath){
          $storage=Storage::disk('public');
          if($storage->exists($product->PicturePath))
          $storage->delete($product->PicturePath);

          $imageName=Str::random(32).".".$request->PicturePath->getClientOriginalExtension();
          $product->PicturePath=$imageName;

          $storage->put($imageName,file_get_contents($request->PicturePath));
       
         }
         $product->save();


        return response()->json(
          ['message'=>'product updated succesfully'],200
        );
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }


        
    }

 
    public function destroy(string $id)
    {


        $product= product::find($id);
        if(!$product){
          return response()->json(['message'=>'product not found'],404);
        }
        $storage=Storage::disk('public');
      
       
          if($storage->exists($product->PicturePath))
          $storage->delete($product->PicturePath);
         
         $product->delete();
         return response()->json(['message'=>'category deleted succesfully']); 
    
    
    }
}


