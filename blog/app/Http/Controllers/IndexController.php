<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;
use App\Product;
use App\Cart;
use App\Payment;
use App\Order;
class IndexController extends Controller
{
    public function index()
    {
        $products = DB::table('products')-> orderBy('created_at', 'desc') -> paginate(12);
        $category = Category::all();
        return view('index')->with('products',$products)->with('category',$category);
    }


    public function userprofile(Request $request)
    {
    	 $users = User::all();
        return view('userprofile')->with('users',$users);
    }

    public function userinfosave(Request $request,$id)
    {
    	

        $userinfo = User::find($id);
        $userinfo->name = $request->input('name');
        $userinfo->phone = $request->input('phone');
        $userinfo->email = $request->input('email');
        $userinfo->birthday = $request->input('birthday');
        $userinfo->gender = $request->input('gender');
        $userinfo->division = $request->input('division');
        $userinfo->address = $request->input('address');
        $userinfo->save();
    	return redirect('/userprofile')->with('status','Information Updated..');
    }

    public function categorydetails($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('categorydetails')->with('category',$category)->with('categories',$categories);
    }
    public function productdetails($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $products = Product::all();
        return view('productdetails')->with('product',$product)->with('categories',$categories)->with('products',$products);
    }

     public function cartstore(Request $request)
    {

        $this->validate($request,[
            'product_id' => 'required'
           

        ]);

        
       
            $cart = Cart::where('user_id', Auth::id())
                      ->where('product_id', $request->product_id)
                      ->first();


            if(!is_null($cart))
            {
            $cart->increment('product_quantity');
            }
            else 
            {
            $cart = new Cart();
            $cart-> user_id = Auth::id();
            $cart->product_id =$request->product_id;
            $cart->save();
            }

       

        

        

        return back()->with('status','Product has  added  to  Cart..');

    }

    public function cart()
    {
        $cart = Cart::all();
        return view('cart')->with('cart',$cart);
    }

    public function updatecart(Request $request,$id)
    {
        $cart = Cart::find($id);
        $cart ->product_quantity = $request->product_quantity;
        $cart->save();
        return back()->with('status','Cart item Updated Successfully...');
    }


    public function deletecart($id)
    {

        $cart = Cart::find($id);
        $cart->delete();
        return back()->with('status','Cart is Removed Sucessfully...');

    }

    public function checkout()
    {
        $cart = Cart::all();
        $users = User::all();
        $payments = Payment::all();
        return view('checkout')->with('cart',$cart)->with('users',$users)->with('payments',$payments);
    }

    public function checkoutstore(Request $request)
    {
    	 $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'division' => 'required',
            'shipping_address' => 'required',
            'payment_id' => 'required',
        ]);


    	 $order = new Order();

    	 if($request->payment_id != '2'){
    	 	if ($request->transection_id == NULL || empty($request->transection_id)) {
    	 		return back()->with('error','pls  give  transection_id...');
    	 	}
    	 }

    	 $order-> user_id = Auth::id();
    	 $order->name = $request->name;
    	 $order->email = $request->email;
    	 $order->phone = $request->phone;
    	 $order->division = $request->division;
    	 $order->shipping_address = $request->shipping_address;
    	 $order->payment_id = $request->payment_id;
    	 $order->total_ammount = $request->total_ammount;
    	 $order->transaction_id = $request->transection_id;
    	 $order->product_name = implode(",", $request->product_name);
    	 $order->product_quantity = implode(",", $request->product_quantity);
    	 $order->save();

    	 foreach (Cart::first()->totalCarts() as $cart) {
    	 	$cart->order_id = $order->id;
    	 	$cart->save();
    	 }

    	 return redirect('/')->with('status','You Have Successfully Purchese A Product From Our Site.Thank You For Chossing Our Site...');

    	 



    }
}
