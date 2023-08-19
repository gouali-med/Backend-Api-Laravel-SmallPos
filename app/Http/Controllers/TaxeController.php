<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Taxe;
use App\Http\Requests\TaxeStoreRequest;
use Exception;

class TaxeController extends Controller
{
    protected $taxe;
    public function _construct()
    {
         $this->taxe=new Taxe();
    }
 
    public function GetAll()
    {
        $taxes= Taxe::orderBy('created_at','DESC')->get();
        return response()->json($taxes,200);
    }
 
    public function store(TaxeStoreRequest $request)
    {
      try{

        Taxe::create($request->all());
        return response()->json([
            'message'=>'Taxe added succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
        
    }
 
    public function update(TaxeStoreRequest $request , string $id)
    {
   
       try{
        $taxe= Taxe::findOrFail($id);
        if(!$taxe){
            return response()->json([
                'message'=>'Taxe not found']
                ,404);
            
        }
  
        $taxe->Valeur=$request->Valeur;
        $taxe->save();
        return response()->json([
            'message'=>'Taxe updated succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
    }
 
    public function destroy(string $id)
    {
     $Taxe= Taxe::findOrFail($id);
        $Taxe->delete();
        return response()->json(['message'=>'Taxe deleted succesfully']); 
    }
}
