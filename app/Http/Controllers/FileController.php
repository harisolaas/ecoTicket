<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use App\Transaction;

class FileController extends Controller
{
    public function printTicket($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        return \PDF::loadView('pdf.ticket', compact('transaction'))->stream();
    }
    public function downloadTicket($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        return \PDF::loadView('pdf.ticket',compact('transaction'))->download();
    }
}
