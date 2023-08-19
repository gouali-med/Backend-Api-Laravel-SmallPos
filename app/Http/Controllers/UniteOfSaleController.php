<?php

namespace App\Http\Controllers;

use App\Models\UniteOfSale;
use Illuminate\Http\Request;
use Exception;

class UniteOfSaleController extends Controller
{
    protected $unitOfSale;
    public function _construct()
    {
         $this->unitOfSale=new UniteOfSale();
    }

    
 
    public function GetAll()
    {
        $unitOfSales= UniteOfSale::orderBy('created_at','DESC')->get();
        return response()->json($unitOfSales,200);
    }
 
    public function store(Request $request)
    {
      try{

        UniteOfSale::create($request->all());
        return response()->json([
            'message'=>'unitOfSale added succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
        
    }

    public function update(Request $request , string $id)
    {
   
       try{
        $unitOfSale= UniteOfSale::findOrFail($id);
        if(!$unitOfSale){
            return response()->json([
                'message'=>'unitOfSale not found']
                ,404);
            
        }
  
        $unitOfSale->Valeur=$request->Valeur;
        $unitOfSale->save();
        return response()->json([
            'message'=>'unitOfSale updated succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
    }
 
    public function destroy(string $id)
    {
     $unitOfSale= UniteOfSale::findOrFail($id);
        $unitOfSale->delete();
        return response()->json(['message'=>'unitOfSale deleted succesfully']); 
    }
}



