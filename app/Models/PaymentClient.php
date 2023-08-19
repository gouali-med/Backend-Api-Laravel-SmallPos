<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentClient extends Model
{
    protected  $table='payment_clients';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'DateOperation'	,
            'Payed'	,
            'DateEcheance',
            "type_payment_id",
            "user_id",
            "sale_id"


    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function type_payment(){
        return $this->belongsTo(TypePayment::class);
    }
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    

    use HasFactory;
}
