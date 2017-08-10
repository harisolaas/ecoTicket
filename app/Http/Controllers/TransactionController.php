<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Transaction;
use App\User;
use Auth;
use App\Mail\Ticket;

class TransactionController extends Controller
{
    public function storeAndSend()
    {
        $user = User::where('email', request()->input('user_email'))->first();
        if (!$user)
        {
            $user = User::create(['email' => request()->input('user_email')]);
        }

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'seller_id' => request()->user()->id,
            'total_amount' => request()->input('total_amount')
        ]);
        foreach (request()->input('products') as $product_id) {
            $transaction->products()->attach($product_id);
        }
        $transaction->update();

        Mail::to($transaction->user->email)->queue(new Ticket($transaction));
    }
}
