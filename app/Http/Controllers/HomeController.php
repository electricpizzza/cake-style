<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->roll == 'admin') {

            $sales = Order::select(
                Order::raw('sum(amount) as sales'), 
                Order::raw('count(*) as orders'), 
                Order::raw("date_part(YEAR, created_at) as year"),
                Order::raw("date_part(month, created_at) AS month")
            )->groupby('year','month')->get();
            return view('dashboard.home',compact('sales'));
        }
        return redirect('/');
    }
}
