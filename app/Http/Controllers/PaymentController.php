<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payable;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function newPayment($id){
        $payable = Payable::find($id); 
        return view('payment.pay', compact('payable'));
    }
}
