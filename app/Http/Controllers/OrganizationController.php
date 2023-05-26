<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function list(){
        $organizations = Organization::all();
        return view('organization.list', compact('organizations'));
    }

    public function creationForm(){
        return view('organization.create');
    }

    public function create(Request $request){
        Organization::create(['name' => $request->get('name')]);
        return redirect('/organizations')->with('status', 'Organization created successfully');
    }

}
