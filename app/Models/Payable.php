<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payable extends Model
{
    const Fee = 'fee';
    const Charge = 'charge';

    protected $fillable = ['name','type', 'principal', 'accrues',
        'accrues_every', 'accrues_by', 'recurs', 'recurs_every', 'organization_id'];

    protected $casts = [
        'accrues' => 'boolean',
        'recurs' => 'boolean'
    ];

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function createPayable(array $data){
        //dd($data);
        return $this->create([
            'name' => $data['name'],
            'type' => $data['type'],
            'principal' => $data['principal'],
            'accrues' => $data['accrues'] == 'on' ? 1:0,
            'accrues_every' => $data['accrues'] == 'on' ? $data['accrual_frequency'].' '.$data['accrual_period']: null,
            'accrues_by' => $data['accrues'] == 'on' ? $data['accrues_by']:null,
            'recurs' => $data['recurs'] == 'on'? 1:0,
            //'due_at' => $data['due_at'],
            'recurs_every' => $data['recurs'] == 'on' ? $data['recursion_frequency'].' '.$data['recursion_period']: null,
            'organization_id' => $data['organization_id'],
        ]);
    }

    public function updatePayable(array $arr){
        //
    }
    
}
