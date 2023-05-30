<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Payable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    //
    public function newPayment($id){
        $payable = Payable::find($id);
        
        $due = Payment::where('payable_id', $id)
            ->latest()->first();
        
        //
        $accrual = 0;
        if($payable->accrues && isset($due->due_at)){
            $arr = explode(' ', $payable->accrues_every);
            $mux = $arr[0];
            $period = $arr[1];
            //dd($arr, $multiplier, $payable->accrues_every);
            //how many periods have passed
            $multiplier = $this->getTimeMultiplier($due->due_at, $period);
            $accrual = ($multiplier/$mux) * $payable->accrues_by;
        } 
        //dd($due);
        
        return view('payment.pay', compact('due','payable'));
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

    private function getTimeMultiplier($due_date, $period){
        switch($period){
            case 'day':
                $date = Carbon::parse($due_date);
                return $date->diffInDays(Carbon::now());
            case 'week':
                $date = Carbon::parse($due_date);
                return $date->diffInWeeks(Carbon::now());
            case 'month':
                $date = Carbon::parse($due_date);
                return $date->diffInMonths(Carbon::now());
            case 'year':
                $date = Carbon::parse($due_date);
                return $date->diffInYears(Carbon::now());   
        }
    }

}
