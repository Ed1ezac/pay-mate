<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'payable_id', 'due', 'amount', 'paid_at', 'due_at'];

    public function payable(){
        return $this->belongsTo(Payable::class);
    }

    public function scopeMine($query){
        return $query->where('user_id', Auth::id());
    }

    public function createPayment(array $data){
        //find latest payment with due > 0
        $latest = Payment::where([
            ['user_id', '=', Auth::id()],
            ['payable_id', '=', $data['payable_id']],
        ])->latest()->first();
        $due = isset($latest) ? $latest->due : 0;
        
        return Payment::create([
            'user_id' => Auth::id(),
            'payable_id' => $data['payable_id'],
            'amount' => $data['amount'],
            'due' => $due > 0 ? $due - $data['amount'] : Payable:: find($data['payable_id'])->principal - $data['amount'],
            'paid_at' => Carbon::now(),
        ]);
    }
}
