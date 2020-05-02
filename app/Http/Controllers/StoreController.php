<?php

namespace App\Http\Controllers;

use App\Message;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index($sexe, $category,Request $sort)
    {
        if ($category=='All') {
            $products = \App\Product::join('available_details', 'products.id', '=', 'available_details.product_id')
        ->select('products.*', 'available_details.sexe')
        ->where('sexe',ucwords($sexe))->latest()->paginate(9);
        }
        else
        switch ($sort->sort) {
            case 'best':
        $products = \App\Product::join('available_details', 'products.id', '=', 'available_details.product_id')
        ->select('products.*', 'available_details.sexe')
        ->where('category_id',$category)
        ->where('sexe',ucwords($sexe))->orderBy('quantity')->paginate(9);
                break;
            case 'latest':
                        $products = \App\Product::join('available_details', 'products.id', '=', 'available_details.product_id')
        ->select('products.*', 'available_details.sexe')
        ->where('category_id',$category)
        ->where('sexe',ucwords($sexe))->latest()->paginate(9);
                break;
            case 'pricehigh':
                        $products = \App\Product::join('available_details', 'products.id', '=', 'available_details.product_id')
        ->select('products.*', 'available_details.sexe')
        ->where('category_id',$category)
        ->where('sexe',ucwords($sexe))->orderBy('price','DESC')->paginate(9);
                break;
            case 'pricelow':
                        $products = \App\Product::join('available_details', 'products.id', '=', 'available_details.product_id')
        ->select('products.*', 'available_details.sexe')
        ->where('category_id',$category)
        ->where('sexe',ucwords($sexe))->orderBy('price')->paginate(9);
                break;
            default:
                        $products = \App\Product::join('available_details', 'products.id', '=', 'available_details.product_id')
        ->select('products.*', 'available_details.sexe')
        ->where('category_id',$category)
        ->where('sexe',ucwords($sexe))->latest()->paginate(9);
                break;
        }

        return view('shop.shop',compact('products','category','sexe','sort'));
    }

    public function detail(Product $product)
    {
        $colors = explode(",",$product->detail->color);
        $sizes = explode(",",$product->detail->size);
        return view('shop.product',compact('product','colors','sizes'));
    }

    public function about()
    {
        return view('shop.about');
    }

    public function contact()
    {
        return view('shop.contact');
    }

    public function message(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'message'=>'required'
        ]);

        Message::create([
            'sender_email'=> $request['email'],
            'message'=> $request['message'],
        ]);
        return redirect('/contact');
    }
}
