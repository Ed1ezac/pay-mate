<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payable;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    //
    public function newPayment($id){
        $payable = Payable::find($id); 
        return view('payment.pay', compact('payable'));
    }

    public function pay(PaymentRequest $request){
        //dd($request->all());
        //dd(number_format($request->input['amount'], 2, ',', '.'));
        $payment = new Payment();
        $payment->createPayment($request->all());

        return redirect('/home')->with('status', 'Payment made successfully.');
    }

    public function myPayments(){
        $payments = Payment::mine()->get();
        
        return view('payment.my-payments', compact('payments'));
    }

}
