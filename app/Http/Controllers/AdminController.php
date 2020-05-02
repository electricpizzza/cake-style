<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index()
    {
        return view('dashboard.profile');
    }

    public function update()
    {
        $data = request()->all();
        auth()->user()->update([
            'name' => $data['first_name'],
            'email' => $data['email'],
        ]);
        auth()->user()->address()->update([
            "address1" =>$data["address1"],
            "address2" =>$data["address2"],
            "city" =>$data["city"],
            "country" =>$data["country"],
            "postcode" =>$data["postcode"],
        ]);
        return(view('dashboard.home'));
    }

}
