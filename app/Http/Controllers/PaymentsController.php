<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {

        //for notifications

        //for one user
//        request()->user()->notify(new PaymentReceived(900));

        //for a collection of users
        //Notification::send(request()->user(), new PaymentReceived());

        //for events

        //ProductPurchased::dispatch('toy');
        event(new ProductPurchased('toy'));

    }
}
