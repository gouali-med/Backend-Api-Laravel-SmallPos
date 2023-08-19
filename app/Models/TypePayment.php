<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePayment extends Model
{
    protected  $table='type_payments';
    protected  $primaryKey='id';
    protected  $fillable=[
        	'Name'	,
    ];
    public function payment_clients(){
        return $this->hasMany(PaymentClient::class);
    }
    use HasFactory;
}
