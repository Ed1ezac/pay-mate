<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    protected $fillable = ['name'];

    public function payables(){
        return $this->hasMany(Payable::class);
    }

}
