<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected  $table='companies';
    protected  $primaryKey='id';
    protected  $fillable=[
            'PicturePath',
        	'Name'	,
            'Telephone',
            'Email',
            'Siteweb',
            'Adresse',
            'ICE',
            'RC',
            'IF',
            'TP'
    ];

    use HasFactory;

}
