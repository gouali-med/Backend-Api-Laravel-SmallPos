<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $table='products';
    protected  $primaryKey='id';
    protected  $fillable=[
            'BarCode',
        	'Name'	,
            'PicturePath',
            'PurchasPrice',
            'Price',
            'StockAlerte',
            'category_id',
            'unite_of_sale_id'

           

    ];
    public function details_sales(){
        return $this->hasMany(DetailsSale::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function uniteOfSale(){
        return $this->belongsTo(UniteOfSale::class);
    }


    use HasFactory;
}
