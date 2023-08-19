<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePayment;
use Exception;

class TypePaymentController extends Controller
{
    protected $typePayment;
    public function _construct()
    {
         $this->typePayment=new TypePayment();
    }
 
    public function GetAll()
    {
        $TypePayments= typePayment::orderBy('created_at','DESC')->get();
        return response()->json($TypePayments,200);
    }
 
    public function store(Request $request)
    {
      try{

        typePayment::create($request->all());
        return response()->json([
            'message'=>'TypePayment added succesfully']
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
        $TypePayment= typePayment::findOrFail($id);
        if(!$TypePayment){
            return response()->json([
                'message'=>'TypePayment not found']
                ,404);
            
        }
  
        $TypePayment->Name=$request->Name;
        $TypePayment->save();
        return response()->json([
            'message'=>'TypePayment updated succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
    }
 
    public function destroy(string $id)
    {
     $TypePayment= typePayment::findOrFail($id);
        $TypePayment->delete();
        return response()->json(['message'=>'TypePayment deleted succesfully']); 
    }
}
