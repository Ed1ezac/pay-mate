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
        //find all payments with due > 0
        $dues = Payment::where([
            ['user_id', '=', Auth::id()],
            ['payable_id', '=', $data['payable_id']],
            ['due', '>', 0],
        ])->get();
        $due = 0;
        foreach($dues as $d){
            $due += $d->due;
        }

        //@dd($due);
        if($data['amount'] == $due){
            foreach($dues as $d){
                $d->update(['due' => 0]);
            }
        }

        return Payment::create([
            'user_id' => Auth::id(),
            'payable_id' => $data['payable_id'],
            'amount' => $data['amount'],
            'due' => $due > 0 ? $due - $data['amount'] : Payable:: find($data['payable_id'])->principal - $data['amount'],
            'paid_at' => Carbon::now(),
        ]);
    }
}
