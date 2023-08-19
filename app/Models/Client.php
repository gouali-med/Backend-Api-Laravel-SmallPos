<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected  $table='clients';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'Name'	,
            'TypeClient',
            'Telephone',
            'Email',
            'Adresse',
            'ICE',
            'RC',
            'IF',
            'TP'
    ];



    public function sales(){
        return $this->hasMany(Sale::class);
    }
    use HasFactory;
}
