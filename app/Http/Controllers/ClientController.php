<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    protected $client;
    public function _construct()
    {
         $this->client=new Client();
    }
 
    public function show($id)
    {
        $client= client::find($id);
        if(!$client){
          return response()->json(['message'=>'client not found'],404);
        }
        return response()->json($client,200);
    }
    public function GetAll()
    {
        $clients= client::orderBy('created_at','DESC')->get();
        return response()->json($clients,200);
    }
 
    public function store(Request $request)
    {
      try{

        client::create($request->all());
        return response()->json([
            'message'=>'client added succesfully']
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
        $client= client::findOrFail($id);
        if(!$client){
            return response()->json([
                'message'=>'client not found']
                ,404);
            
        }
        $client->TypeClient=$request->TypeClient;
        $client->Name=$request->Name;
        $client->Telephone=$request->Telephone;    
        $client->Email=$request->Email;
        $client->Adresse=$request->Adresse;
        $client->ICE=$request->ICE;
        $client->RC=$request->RC;
        $client->IF=$request->IF;
        $client->TP=$request->TP;
        $client->save();
        return response()->json([
            'message'=>'client updated succesfully']
            ,200);
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }
    }
 
    public function destroy(string $id)
    {
     $client= client::findOrFail($id);
        $client->delete();
        return response()->json(['message'=>'client deleted succesfully']); 
    }
}
