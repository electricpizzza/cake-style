<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

   public function index () {
        $products = Product::latest()->paginate(6);
        return view('dashboard.product.products',compact('products'));
    }
    public function pended () {
        $orders = Order::where('status','pended')->OrWhere('status','payed')->latest()->paginate(6);
        return view('dashboard.orders.pended',compact('orders'));
    }
    public function orders () {
        $orders = Order::latest()->paginate(6);
        return view('dashboard.orders.allorders',compact('orders'));
    }

    public function orderdetail (Order $order) {
        return view('dashboard.orders.detail',compact('order'));
    }

    public function orderedit (Order $order ,Request $request) {
        $order->update([
            'status'=> $request['status']
        ]);
        return redirect('/orders');
     }

    public function add () {
        return view('dashboard.product.create');
    }

    public function edit (Product $product) {
        return view('dashboard.product.edit',compact('product'));
    }

    public function create()
    {   
        $data = request()->validate([
            "title" => "required|string",
            "category" => "required|string",
            "sexe" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|int",
            "tag" => "string",
            "brand" => "required|string",
            "size" => "required",
            "color" => "required",
            "description" => "string",
            "showen_as" => "required",
            "sale" => "required|int",
            "image1" => "required",
            "image2" => "",
            "image3" => "",
        ]);
        
        $tags = explode(",",$data["tag"]);

        $product = Product::create([
            "title" => $data["title"],
            "category_id" => $data["category"],
            "price" => $data["price"],
            "quantity" => $data["quantity"],
            "brand" => $data["brand"],
            "description" => $data["description"],
            "showen_as" => $data["showen_as"],
            "sale" => $data["sale"],
            "available" => $data["quantity"],
        ]);
        $colors ="";
        for ($i=0; $i < count($data["color"])-1; $i++) { 
            $colors.=$data["color"][$i].',';
        }
        $colors.=$data["color"][count($data["color"])-1];
        $sizes ="";
        for ($i=0; $i < count($data["size"])-1; $i++) { 
            $sizes.=$data["size"][$i].',';
        }
        $sizes.=$data["size"][count($data["size"])-1];

       
        $product->detail()->create([
            "size" => $sizes,
            "color" => $colors,
            "sexe" => $data["sexe"],    

        ]);

        foreach ($tags as $tag) {
            $product->tags()->create([
                "tag"=>$tag,
            ]);
        }

        $image1 = request("image1")->store("productimg","public");

            $product->images()->create([
                "image"=>$image1
            ]);
        if(request("image2")!=null){ 
            $image2 = request("image2")->store("productimg","public");
            $product->images()->create([
                "image"=>$image2
            ]);
        }
        if(request("image3")!=null){
        $image3 = request("image3")->store("productimg","public");
            $product->images()->create([
                "image"=>$image3
            ]);
        }

        return redirect('products');
    }

    public function update(Product $product)
    {
        $data = request()->validate([
             "title" => "required|string",
             "category" => "required|string",
             "sexe" => "required|string",
             "price" => "required|numeric",
             "quantity" => "required|int",
             //"tag" => "",
             "brand" => "required|string",
             "size" => "",
             "color" => "",
             "showen_as" => "required|string",
             "sale" => "required|int",
             "description" => "string",
             "image1" => "image",
             "image2" => "image",
             "image3" => "image",
        ]);
        $tags = explode(",",$data["tag"]);

        $product->update([
            "title" => $data["title"],
            "category_id" => $data["category"],
            "price" => $data["price"],
            "quantity" => $data["quantity"],
            "brand" => $data["brand"],
            "description" => $data["description"],
            "showen_as" => $data["showen_as"],
            "sale" => $data["sale"],
            "available" => $data["quantity"],
        ]);
        if(request("color")!=null){
            $colors ="";
            for ($i=0; $i < count($data["color"])-1; $i++) { 
                $colors.=$data["color"][$i].',';
            }
            $colors.=$data["color"][count($data["color"])-1];
        }
        if(request("size")!=null){
            $sizes ="";
            for ($i=0; $i < count($data["size"])-1; $i++) { 
                $sizes.=$data["size"][$i].',';
            }
            $sizes.=$data["size"][count($data["size"])-1];
        }
    
        $product->detail()->update([
            "size" => $sizes??$product->detail->size,
            "color" => $colors??$product->detail->color,
            "sexe" => $data["sexe"],    

        ]);
    if(request("image2")!=null){ 
        $image1 = request("image1")->store("productimg","public");
        $product->images()->update([
            "image"=>$image1
        ]);
    }
    if(request("image2")!=null){ 
        $image2 = request("image2")->store("productimg","public");
        $product->images()->update([
            "image"=>$image2
        ]);
    }
    if(request("image3")!=null){
    $image3 = request("image3")->store("productimg","public");
        $product->images()->update([
            "image"=>$image3
        ]);
        
    }
    return redirect('products');
    }
    
}

