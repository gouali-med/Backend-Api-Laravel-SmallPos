<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Taxe;
use app\Models\Product;

class Category extends Model
{
    protected  $table='categories';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'Name'	,
            'Picture',
            'taxe_id'
    ];
    
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function taxe(){
        return $this->belongsTo(Taxe::class);
    }

    use HasFactory;


}
