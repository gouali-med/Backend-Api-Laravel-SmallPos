<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleStoreRequest;
use App\Models\Sale;
use App\Models\DetailsSale;
use App\Models\PaymentClient;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;

class SaleController extends Controller
{
    protected $sale;
    public function _construct()
    {
         $this->sale=new Sale();
    }
 
    public function show($id)
    {
        $sale= sale::find($id);
        if(!$sale){
          return response()->json(['message'=>'sale not found'],404);
        }
        return response()->json($sale,200);
    }
    public function GetAll()
    {
        $sales= sale::orderBy('created_at','DESC')->get();
        return response()->json($sales,200);
    }
 
    public function store(Request $request)
    {

      try{
        
        $Data = $request->all();
        $sale = sale::create([
            'DateOperation' =>  date('Y-m-d H:i:s'),
            'TotalHT' => $request->TotalHT,
            'TotalTVA' =>$request->TotalTVA,
            'TotalTTC' =>$request->TotalTTC,
            'Solde' => $request->Solde,
            'Reste' => $request->Reste,
            'client_id' =>$request->client_id,
            'user_id' => $request->user_id,

        ]);

        PaymentClient::create([
           
            'DateOperation' => date('Y-m-d H:i:s'),
            'DateEcheance' =>date('Y-m-d H:i:s'),
            'Payed' =>$request->TotalTTC,
            'type_payment_id' => $request->type_payment_id,
            'sale_id' =>$sale->id,
            'user_id' => $request->user_id,

        ]);
        
        
        foreach ($Data['Details'] as $item) {
            DetailsSale::create([
                'sale_id' => $sale->id,
                'product_id' => $item['product_id'],
                'Quantite' => $item['Quantite'],
                'Montant' => $item['Montant'],
            ]);
        }
        return response()->json(
          ['message'=>'sale added succesfully'],200
        );
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex],500);
 
      }

 

        
    }
 
  
  
    public function update(saleStoreRequest $request,$id)
    {


      try{
        $sale= sale::find($id);
        if(!$sale){
          return response()->json(['message'=>'sale not found'],404);
        }

        $sale->Name=$request->Name;
        $sale->BarCode=$request->BarCode;
        $sale->PurchasPrice=$request->PurchasPrice;
        $sale->Price=$request->Price;
        $sale->StockAlerte=$request->StockAlerte;
        $sale->category_id=$request->category_id;
        $sale->unite_of_sale_id=$request->unite_of_sale_id;

         if($request->PicturePath){
          $storage=Storage::disk('public');
          if($storage->exists($sale->PicturePath))
          $storage->delete($sale->PicturePath);

          $imageName=Str::random(32).".".$request->PicturePath->getClientOriginalExtension();
          $sale->PicturePath=$imageName;

          $storage->put($imageName,file_get_contents($request->PicturePath));
       
         }
         $sale->save();


        return response()->json(
          ['message'=>'sale updated succesfully'],200
        );
 
      }
      catch(Exception $ex)
      {
        return response()->json(['message'=>$ex]);
 
      }


        
    }

 
    public function destroy(string $id)
    {
     $sale= sale::findOrFail($id);
        $sale->delete();
        return response()->json(['message'=>'sale deleted succesfully']); 
    }
}



