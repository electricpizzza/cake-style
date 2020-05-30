<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class ShopController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function addtocart($product)
    {
        $data = request()->all();
        $item = auth()->user()->cartitems()->create();
         $item->detail()->create([
             "size"=>$data["size"],
             "color"=>$data["color"],
             "sexe"=>$data["sexe"],
             "product_id"=> $product
         ]);

         return redirect('product/'.$product);
    }
    public function removefromcart(CartItem $item)
    {
        $item->detail()->delete();
        $item->delete();
    }

    public function checkout()
    {
        $cartitems = auth()->user()->cartitems()->get();
        return view('shop.checkout',compact('cartitems'));
    }

    public function order()
    {
        $data = request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            "address1" => ['required', 'string', 'max:255'],
            "address2" => ['string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            "postcode" => ['required', 'string', 'max:255'],
            "phone" => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'payed'=>"",
            'amount'=>"",
            "customCheck1" => "required",
            "customCheck3" => ""
        ]);

        $cartitems = auth()->user()->cartitems()->get();

          auth()->user()->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            "phone" => $data["phone"], 
        ]);

        auth()->user()->address->update([
            "country" =>$data["country"],
            'city' => $data["city"],
            "postcode" => $data["postcode"],
            "address1" => $data["address1"],
            "address2" => $data["address2"],
        ]);

            // the order

        $order = auth()->user()->orders()->create([
            'address_id'=>auth()->user()->address->id,
            'status'=>$data['payed'] ?? 'pended',
            'amount'=>$data['amount']  
        ]);

        $user = auth()->user();
        foreach ($user->cartitems()->get() as $item) {
            $orderitem=$order->items()->create([
                'product_detail_id'=>$item->detail->id,
                'quantity'=>1,
                ]);
            $orderitem->detail()->create([
                'product_id'=>$item->detail->product->id,
                "sexe"=>$item->detail->sexe,
                "color"=>$item->detail->color,
                "size"=>$item->detail->size,
            ]);
            $item->detail()->delete();
            $item->detail->product->update([
                'available'=>$item->detail->product->available-1,
            ]);
        }
        $user->cartitems()->delete();


    //  mail('zackdinar1234@gmail.com','CakeStyle SHOP Payment',
    //    " <h6><i class='fa fa-quote-left' aria-hidden='true'></i> Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</h6>
    //      <span>Liam Neeson</span>");
        return redirect('/myorders');
    }

    public function myorders()
    {
        $orders = auth()->user()->orders()->get();
        return view('shop.myorders',compact('orders'));
    }
}
