<?php

use App\Models\Payable;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
     $trail->push('Home', route('home'));
});

Breadcrumbs::for('my-payments', function (BreadcrumbTrail $trail) {
    $trail->push('My Payments', url('/my-payments'));
});

Breadcrumbs::for('pay', function (BreadcrumbTrail $trail, $pay) {
    $trail->parent('home');
    $trail->push('Pay For '.$pay->name, url('/pay/for/payable/id/'.$pay->id ));
});

Breadcrumbs::for('organizations', function (BreadcrumbTrail $trail) {
    $trail->push('Organizations' , url('/organizations'));
});

Breadcrumbs::for('create-org', function (BreadcrumbTrail $trail) {
    $trail->parent('organizations');
    $trail->push('New Organization', url('/new/organization'));
});


Breadcrumbs::for('fees', function (BreadcrumbTrail $trail) {
    $trail->push('Fees & Charges' , url('/fees-and-charges'));
});

Breadcrumbs::for('new-payable', function (BreadcrumbTrail $trail) {
    $trail->parent('fees');
    $trail->push('New Fees/Charges' , url('/new/payable'));
});

/*Breadcrumbs::for('pay', function (BreadcrumbTrail $trail, $pay) {
    $trail->parent('home');
    $trail->push('Pay For '.$pay->name, url('/pay/for/payable/id/'.$pay->id ));
});*/



