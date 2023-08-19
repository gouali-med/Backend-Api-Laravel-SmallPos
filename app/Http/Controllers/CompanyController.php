<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Exception;

class CompanyController extends Controller
{
    protected $company;
    public function _construct()
    {
         $this->company=new Company();
    }
 
    public function show($id)
    {
        $company= company::find($id);
        if(!$company){
          return response()->json(['message'=>'company not found'],404);
        }
        return response()->json($company,200);
    }
    public function GetAll()
    {
        $companies= company::orderBy('created_at','DESC')->get();
        return response()->json($companies,200);
    }
 
    public function store(Request $request)
    {
      try{

        company::create($request->all());
        return response()->json([
            'message'=>'company added succesfully']
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
        $company= company::findOrFail($id);
        if(!$company){
            return response()->json([
                'message'=>'company not found']
                ,404);
            
        }
        $company->PicturePath=$request->PicturePath;
        $company->Name=$request->Name;
        $company->Telephone=$request->Telephone;    
        $company->Email=$request->Email;
        $company->Adresse=$request->Adresse;
        $company->Siteweb=$request->Siteweb;
        $company->ICE=$request->ICE;
        $company->RC=$request->RC;
        $company->IF=$request->IF;
        $company->TP=$request->TP;
        $company->save();
        return response()->json([
            'message'=>'company updated succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
    }
 
    public function destroy(string $id)
    {
     $company= company::findOrFail($id);
        $company->delete();
        return response()->json(['message'=>'company deleted succesfully']); 
    }
}


