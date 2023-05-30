<?php

namespace App\Http\Controllers;

use App\Models\Payable;
use App\Models\Organization;
use Illuminate\Http\Request;

class PayableController extends Controller
{
    public function creationForm(){
        $organizations = Organization::all();
        return view('payable.create', compact('organizations'));
    }

    public function forOrganization($id){
        $org = Organization::find($id);
        $payables = $org->payables;
        //dd($payables);
        return view('payable.for-org', compact('org', 'payables'));
    }

    public function create(Request $request){
        $payable = new Payable();
        //dd($request->all());
        $payable->createPayable($request->all());

        return redirect('/organization/'. $request->get('organization_id') .'/payables')
            ->with('status', 'Payable created successfully');
    }

    public function list(){
        $payables = Payable::all();
        return view('payable.list', compact('payables'));
    }

    public function edit(){
        
    }
    
    public function update(){

    }

    public function delete(){
        //
    }
}
