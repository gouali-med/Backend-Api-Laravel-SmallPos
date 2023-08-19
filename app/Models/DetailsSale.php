<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsSale extends Model
{

    protected  $table='details_sales';
    protected  $primaryKey='id';
    protected  $fillable=[
        
            'Quantite'	,
            'Montant',
            'sale_id',
            'product_id'


    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    use HasFactory;
}
