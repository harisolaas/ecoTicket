<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Seller;

class SellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    /**
     * Show the home index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = request()->user()->transactions;
        $promotions = request()->user()->promotions;

        $this->salesChart();
        $topProducts = $this->topProducts();

        return view('seller.overview', compact('transactions', 'promotions', 'topProducts'));
    }

    /**
     * Show the required section.
     *
     * @return \Illuminate\Http\Response
     */
    public function section($section)
    {
        $transactions = request()->user()->transactions;
        $promotions = request()->user()->promotions;

        switch ($section)
        {
            case 'new-ticket':
                $view = 'seller.create-ticket';

                break;

            case 'all-tickets':
                $view = 'seller.all-tickets';

                break;

            case 'promotions':
                $view = 'seller.promotions';

                break;

            default:
                $view = 'seller.overview';

                break;
        }

        return view($view, compact('transactions', 'promotions'));
    }

    /**
     * Get 10 top products.
     *
     * @return Array
     */
    public function topProducts()
    {
        $data = Seller::find(request()->user()->id)->products()
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

    /**
     * Create LavaChart object.
     *
     * @return void
     */
    public function salesChart()
    {
        $data = Seller::find(request()->user()->id)->getSalesByDay();
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
}
