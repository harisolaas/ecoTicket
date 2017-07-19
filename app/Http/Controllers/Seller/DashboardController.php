<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use App\Seller;
use App\Transaction;

class DashboardController extends Controller
{
    public function datos () {
        $data = Seller::find(8)->getSalesByDay();
        $sales = \Lava::DataTable();

        $sales->addDateColumn('Fecha')->addNumberColumn('Ventas');
        foreach ($data as $date => $totalAmount) {
            $sales->addRow([$date, $totalAmount]);
        }


        header('Content-Type: application/json');
        print  $sales->toJson();
    }
    public function salesChart()
    {
        // $this->datos();

        \Lava::AreaChart('Ventas', \Lava::DataTable(), [
            'title' => 'Ventas en el último mes',
            'legend' => [
                'position' => 'in'
            ]
        ]);
        return view('seller.home');
    }
    public function salesHeatMap()
    {

    }
    public function topProducts()
    {
        $products = [];
        $data = Seller::find(5)->transactions
            ->map(function($transaction)
            {
                return $transaction->products
                    ->mapWithkeys(function($product)
                        {
                            return [$product->name => $product->price];
                        });
            });
            // ->flatMap(function($products)
            // {
            //     return $products;
            // });
        dd($data);
    }
}
