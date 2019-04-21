<?php

namespace App\Http\Controllers\Admin;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Order;
use App\Order_item;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact;
use Auth;

class adminController extends Controller
{
    //

    public function index(){
         $products = Product::paginate('10');

         return view('adminProducts',['products' => $products]);
    }

    public function editProduct(Request $request,$id){
         $product = Product::find($id);

         return view('admin.editProduct',['product' => $product]);
    }

    public function editProductImageForm(Request $request,$id){
        $product = Product::find($id);

        return view('admin.editProductImage',['product' => $product]);
    }

    public function editProductImage(Request $request,$id){

        Validator::make($request->all(),["image" => "required|image|mimes:jpeg,jpg,png|max:5000"])->validate();

         if($request->hasFile('image')){
             $product = Product::find($id);

             $exists = Storage::disk('local')->exists("public/product_images/".$product->image);

             if($exists){
                 Storage::delete("public/product_images/".$product->image);
             }

             $ext = $request->file('image')->getClientOriginalExtension();

             $request->image->storeAs("public/product_images/",$product->image);

             $arrayToUpdate = array("image" => $product->image);
             DB::table('products')->where('id',$id)->update($arrayToUpdate);

             return redirect()->route('admin');
         }else{
             $error = "No File Chosen";
             return $error;
         }
    }

    public function updateProduct(Request $request,$id){

           $validator = Validator::make($request->all(), [
               'name'=>'required|max:50',
               'description'=>'required|max:250',
               'price'=>'required|numeric',
               'type'=>'required|max:100'
           ]);

            if($validator->fails()){
                return redirect('/admin/editProduct/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            }

            $name = $request->input('name');
            $description = $request->input('description');
            $price = $request->input('price');
            $typeRaw = $request->input('type');
            $type = strtolower($typeRaw);

        $updateArray = array("name" => $name, "description" => $description, "price" => $price, "type" => $type);
        DB::table('products')->where('id',$id)->update($updateArray);

        return redirect()->route('admin');
    }

    public function addProduct(){
        $product = "Nayan";

        return view('admin.addProduct',['product' => $product]);
    }

    public function addProductStore(Request $request){

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $typeRaw = $request->input('type');
        $type = strtolower($typeRaw);

        Validator::make($request->all(),["image" => "required|image|mimes:jpeg,jpg,png|max:5000",
                'name'=>'required|max:50',
               'description'=>'required|max:250',
               'price'=>'required|numeric',
               'type'=>'required|max:100'
        ])->validate();

        $ext = $request->file('image')->getClientOriginalExtension();
        $stringRestructure = str_replace(" ","",$request->input('name'));
        $imageName = $stringRestructure.".".$ext;

        $request->image->storeAs("public/product_images/",$imageName);

        $newProduct = array("name" => $name, "description" => $description, "image" => $imageName,"price" => $price ,"type" => $type);

        DB::table('products')->insert($newProduct);

        return redirect()->route('admin');
    }

    public function deleteProduct($id){
        $product = Product::find($id);

        $exists = Storage::disk('local')->exists("public/product_images/".$product->image);

        if($exists){
            Storage::delete("public/product_images/".$product->image);
        }

        Product::destroy($id);

        return redirect()->route('admin');
    }

    public function showOrders(Request $request){
        $orders = Order::paginate('11');

        return view('showOrders',['orders' => $orders]);
    }

    public function editOrder(Request $request,$id){
        $order = Order::find($id);

        return view('admin.editOrder',['order' => $order]);
    }

    public function updateOrder(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'price'=>'required|numeric',
            'date'=>'required|date',
            'status'=>'required|max:250',
            'del_date'=>'required|date',
            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'email'=>'required|email',
            'address' => 'required|max:250',
            'phone'=>'required|numeric',

        ]);

        if($validator->fails()){
            return redirect('/admin/editOrder/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $price = $request->input('price');
        $date = $request->input('date');
        $status = $request->input('status');
        $del_date = $request->input('del_date');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');


        $updateArray = array(
            "price" => $price,
            "date" => $date,
            "status" => $status,
            "del_date" => $del_date,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "address" => $address,
            "phone" => $phone);

        DB::table('orders')->where('id',$id)->update($updateArray);

        return redirect()->route('showOrders');
    }

    public function deleteOrder($id){


        Order::destroy($id);

        return redirect()->route('showOrders');
    }

    public function orderInfo(Request $request,$id){
        $items = DB::table('order_items')->where('order_id',$id)->get();

        return view('showOrderInfo',['items' => $items]);
    }

    public function contact(Request $request){
        return view('contact');
    }

    public function contactSend(Request $request){

        Validator::make($request->all(),[

            'email'=>'required|email',
            'subject'=>'required|max:150',
            'body'=>'required'
        ])->validate();

         $email = $request->input('email');
         $subject = $request->input('subject');
         $body =  $request->input('body');

         $user = Auth::user();

         Mail::to('eshopper@nayangoswami.com')->send(new contact($user,$email,$body,$subject));


        return redirect()->back()->with('status','Your message has been successfully received');
    }

}
