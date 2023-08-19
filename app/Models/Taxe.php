<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Category;

class Taxe extends Model
{
    protected  $table='taxes';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'Valeur'	,
           
    ];
    public function categories(){
        return $this->hasMany(Category::class);
    }
    use HasFactory;
}
