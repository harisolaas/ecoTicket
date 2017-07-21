<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use App\Seller;
use App\Transaction;

class DashboardController extends Controller
{
    public function show()
    {
        $this->salesChart();
        $topProducts = $this->topProducts();

        return view('seller.home', compact('topProducts'));
    }

    public function salesChart()
    {
        $data = Seller::find(8)->getSalesByDay();
        $sales = \Lava::DataTable();

        $sales->addDateColumn('Fecha')->addNumberColumn('Ventas');
        foreach ($data as $date => $totalAmount) {
            $sales->addRow([$date, $totalAmount]);
        }

        \Lava::AreaChart('Ventas', $sales, [
            'title' => 'Ventas en el último mes',
            'legend' => [
                'position' => 'in'
            ]
        ]);
    }

    public function salesHeatMap()
    {

    }

    public function topProducts()
    {
        $data = Seller::find(11)->products()
            ->orderBy('sales_count', 'desc')
            ->limit(10)
            ->get()
            ->map( function ($p)
                {
                    return [
                            'name' => $p->name,
                            'revenue' => $p->price*$p->sales_count,
                            'sales' => $p->sales_count
                        ];
                });
        return $data;
    }
}
