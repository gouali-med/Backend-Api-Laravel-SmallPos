<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $category;
    public function _construct()
    {
         $this->category=new Category();
    }
 
    public function getTaxeByCategoryId($id){

      $category = Category::where('id', $id)->first();
      $taxe = $category->taxe->valeur;
     if(!$taxe){
       return response()->json(['message'=>'product not found'],404);
     }
     return response()->json($taxe,200);
    }

    public function show($id)
    {
        $category= category::find($id);
        if(!$category){
          return response()->json(['message'=>'Category not found'],404);
        }
        return response()->json($category,200);
    }
    public  function  GetAll()
    {
        $categories= category::orderBy('created_at','DESC')->get();
        return response()->json($categories,200);
    }
 
    public function store(CategoryStoreRequest $request)
    {

      try{
        

        $imageName=Str::random(32).".".$request->Picture->getClientOriginalExtension();

        category::create([
          'Name'=>$request->Name	,
          'Picture'=>$imageName,
          'taxe_id'=>$request->taxe_id
        ]);

        Storage::disk('public')->put($imageName,file_get_contents($request->Picture));
       
        return response()->json(
          ['message'=>'category added succesfully'],200
        );
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }

 

        
    }
 
  
  
    public function update(CategoryStoreRequest $request,$id)
    {


      try{
        $category= category::find($id);
        if(!$category){
          return response()->json(['message'=>'Category not found'],404);
        }

        $category->Name=$request->Name;
        $category->taxe_id=$request->taxe_id;

         if($request->Picture){
          $storage=Storage::disk('public');
          if($storage->exists($category->Picture))
          $storage->delete($category->Picture);

          $imageName=Str::random(32).".".$request->Picture->getClientOriginalExtension();
          $category->Picture=$imageName;

          $storage->put($imageName,file_get_contents($request->Picture));
       
         }
         $category->save();


        return response()->json(
          ['message'=>'category updated succesfully'],200
        );
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }


        
    }

 
    public function destroy(string $id)
    {

        $category= category::find($id);
        if(!$category){
          return response()->json(['message'=>'Category not found'],404);
        }
        $storage=Storage::disk('public');
      
       
          if($storage->exists($category->Picture))
          $storage->delete($category->Picture);
         
         $category->delete();
         return response()->json(['message'=>'category deleted succesfully']); 
    
    
      }
}

