<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $table='bank_details';
    public $primary_key='id';
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
