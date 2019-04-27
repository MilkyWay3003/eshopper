<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\emptyClass;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;
use Auth;
use App\Mail\orderShipped;
use Illuminate\Support\Facades\Mail;


class ProductsController extends Controller
{
    //

    public function index(){
        $products = Product::paginate('10');

        return view("products",compact("products"));
    }

    public function addToCart(Request $request,$id){

        //$request->session()->forget("cart");
        //$request->session()->flush();

         $prevCart = $request->session()->get('cart');
         $cart = new Cart($prevCart);

         $product = Product::find($id);
         $cart->addItem($id,$product);
         $request->session()->put('cart',$cart);

         return redirect()->route('allProducts');
    }

    public function increaseSingleProduct(Request $request,$id){
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->increaseSingleProduct($id,$product);
        $request->session()->put('cart',$cart);

        return redirect()->route('showCart');
    }

    public function decreaseSingleProduct(Request $request,$id){
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->decreaseSingleProduct($id,$product);
        $request->session()->put('cart',$cart);



        return redirect()->route('showCart');
    }

    public function showCart(Request $request){
        $cart = $request->session()->get('cart');

        if($cart){
           return view("cart",["cartItems" => $cart]);
        }else{
            $cart = new emptyClass();
            return view("cart",["cartItems" => $cart]);
        }
    }

    public function deleteProduct(Request $request,$id){

        $cart = $request->session()->get("cart");

        if(array_key_exists($id,$cart->items)){
            unset($cart->items[$id]);
        }

        $prevCart = $request->session()->get("cart");
        $updatedCart = new Cart($prevCart);
        $updatedCart->updateQuantity();

        $request->session()->put("cart",$updatedCart);

        return redirect()->route("showCart");
    }

    public function menProducts(){
        $products = DB::table('products')->where('type','men')->get();

        return view("menProducts",compact("products"));
    }

    public function kidsProducts(){
        $products = DB::table('products')->where('type','kids')->get();

        return view("kidsProducts",compact("products"));
    }


    public function womenProducts(){
        $products  = DB::table('products')->where('type','women')->get();

        return view("womenProducts",compact("products"));
    }

    public function searchProduct(Request $request){
        $searchText = $request->input('searchProduct');

        $products = Product::where('name','like','%'.$searchText.'%')->paginate('4');

        return view('products',['products' => $products]);
    }

    public function checkOut(Request $request){

        $cart = $request->session()->get('cart');

        if($cart){
            return view("checkout",["cartItems" => $cart]);
        }

    }

    public function paymentShow(Request $request){

        $payment_info = $request->session()->get('payment_info');

        if($payment_info['status'] == 'on_hold'){
            return view("payment.payment",["payment_info" => $payment_info]);
        }else{
            return view("products");
        }



    }

    public function createNewOrder(Request $request){

        Validator::make($request->all(),[
            "email" => "required||email",
            'first_name'=>'required|regex:/^[a-zA-Z]+$/u|max:50',
            'last_name'=>'required|regex:/^[a-zA-Z]+$/u|max:250',
            'address'=>'required',
            'zip'=>'required|max:100',
            'phone' => 'required|numeric'

        ])->validate();

        $cart = $request->session()->get('cart');

        if ($cart) {
            $date = date("Y-m-d");
            $time = date("g:i:s A");
            $email = $request->input('email');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $address = $request->input('address');
            $zip = $request->input('zip');
            $phone = $request->input('phone');
            $user_id = Auth::user()->id;


            $newOrderArray = array(
                "date" => $date,
                "time" => $time,
                "status" => "on_hold",
                "price" => $cart->totalPrice + $cart->totalPrice*0.13,
                "del_date" => $date,
                "first_name"=>$first_name,
                "last_name" => $last_name,
                "email" => $email,
                "address" => $address,
                "zip" => $zip,
                "phone" => $phone,
                "user_id" => $user_id

                );
            $create_order = DB::table('orders')->insert($newOrderArray);
            $createdOrder_id = DB::getPdo()->lastInsertId();

            foreach($cart->items as $item){
                $item_id = $item['data']['id'];
                $order_id = $createdOrder_id;
                $quantity = $item['quantity'];

                $newOrderItemsArray = array("item_id" => $item_id, "order_id" => $order_id, "item_name" => $item['data']['name'],"item_price" => $item['data']['price'],"quantity" => $quantity);
                $insertOrderItems = DB::table('order_items')->insert($newOrderItemsArray);
            }
             $user = Auth::user();

           // Mail::to($user)->send(new orderShipped($cart,$user));

            $request->session()->forget('cart');


            $payment_info = $newOrderArray;
            $request->session()->put('payment_info',$payment_info);

            return redirect()->route('paymentShow');
        }else{
            return redirect()->route('allProducts');
        }

    }



}
