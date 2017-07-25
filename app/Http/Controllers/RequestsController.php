<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Seller;
use App\Product;

class RequestsController extends Controller
{
    public function usersCount()
    {
        print User::count();
    }

    public function checkEmailAvailability()
    {
        if (request()->source == '/seller/register') {
            $res = boolval(Seller::where('email', request()->email)->first());
        }else {
            $res = boolval(User::where('email', request()->email)->first());
        }
        $res = json_encode($res);
        print $res;
    }

    public function getSalesChartData()
    {
        $data = Seller::find(5)->getSalesByDay();
        $sales = \Lava::DataTable();

        $sales->addDateColumn('Fecha')->addNumberColumn('Ventas');
        foreach ($data as $date => $totalAmount) {
            $sales->addRow([$date, $totalAmount]);
        }


        header('Content-Type: application/json');
        print  $sales->toJson();
    }

    public function getProduct()
    {
        $res = Product::where('barcode', request()->barcode)->first();
        $res = json_encode($res);
        print $res;
    }
}
