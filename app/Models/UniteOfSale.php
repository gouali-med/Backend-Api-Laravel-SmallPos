<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteOfSale extends Model
{
    protected  $table='unite_of_sales';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'Name'	,

    ];
    public function products(){
        return $this->hasMany(Product::class);
    }


    use HasFactory;
}
