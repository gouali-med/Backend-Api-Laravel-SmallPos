<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected  $table='sales';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'DateOperation'	,
            'TotalHT',
            'TotalTVA',
            'TotalTTC',
            'Solde',
            'Reste',
            'client_id',
            'user_id'
            

    ];
    
    public function details_sales(){
        return $this->hasMany(DetailsSale::class);
    }

    public function payment_clients(){
        return $this->hasMany(PaymentClient::class);
    }
    public function Client(){
        return $this->belongsTo(Client::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
