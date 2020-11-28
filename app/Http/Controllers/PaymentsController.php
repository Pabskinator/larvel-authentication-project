<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        //for one user
        request()->user()->notify(new PaymentReceived());

        //for a collection of users
//        Notification::send(request()->user(), new PaymentReceived());
    }
}
