<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //use HasFactory;
    protected $fillable = ['name'];

    /*public function payables(){
        return $this->hasMany(Payable::class);
    }*/

}
