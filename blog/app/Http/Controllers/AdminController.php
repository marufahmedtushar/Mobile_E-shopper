<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\Product;
use App\Setting;
class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard');

    }

    public function users(){
           $users = User::all();
        return view('admin.users')->with('users',$users);
    }

    public function userroleupdate(Request $request){
        $users = User::findOrFail($request->id);
        $users->user_type = $request->input('user_type');
        $users->update();

        return redirect('/users')->with('status','User Role Updated...');
    }

    public function userdelete(Request $request)
    {

        $users = User::findOrFail($request->user_id);
        $users->delete();

        return redirect('/users')->with('status','User Deleted...');

    }


    public function categories()
    {
    	$categories = Category::all();
        return view('admin.categories')->with('categories',$categories);

    }

    public function catstore(Request $request){

        $this->validate($request,[
            'name' => 'required'
      
            

        ]);



        $cat = new Category();
        $cat->name = $request->input('name');
        $cat-> user_id = Auth::id();
        $cat->save();

        return redirect('/categories')->with('status','New Category Created...');
    }


    public function updatecat(Request $request){
        $cat = Category::findOrFail($request->id);
        $cat->name = $request->input('name');
        $cat->status = $request->input('status');

        $cat->update();

        return redirect('/categories')->with('status','Category Updated...');
    }


    public function products()
    {
    	$products = Product::all();
        return view('admin.products')->with('products',$products);

    }

    public function addproducts()
    {
        $categories = Category::all();
        return view('admin.addproducts')->with('categories',$categories);

    }

    public function productstore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'os' => 'required',
            'weight' => 'required',
            'color' => 'required',
            'screen' => 'required',
            'build' => 'required',
            'resolution' => 'required',
            'dimension' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'price' => 'required',
            'expandable' => 'required',
            'RAM' => 'required',
            'ROM' => 'required',
            'numberofcores' => 'required',
            'SoC' => 'required',
            'CPU' => 'required',
            'GPU' => 'required',
            'img1' => 'image|nullable|max:1999',
            'img2' => 'image|nullable|max:1999',
            'img3' => 'image|nullable|max:1999',
            'img4' => 'image|nullable|max:1999',
            'img5' => 'image|nullable|max:1999',
            'featurues' => 'required',
            'vedio' => 'required',
            'primary' => 'required',
            'secondary' => 'required',
            'battery' => 'required',
            'charging' => 'required',
            'wifi' => 'required',
            'internet' => 'required',
            'USB' => 'required',
            'bluetooth' => 'required',
            'radio' => 'required',
            'sensors' => 'required',
            'firstarrival' => 'required',
            'manufacturedby' => 'required',
            'SIM' => 'required',
            'other_features' => 'required',
        ]);

        //file upload
        //file upload
        if($request->hasFile('img1'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img1')->getClientOriginalExtension();
            //file name to  store
            $img1NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img1')->storeAs('public/cover_images',$img1NameToStore);


        }
        else{
            $img1NameToStore = 'noimage.jpg';
        }

        if($request->hasFile('img2'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img2')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img2')->getClientOriginalExtension();
            //file name to  store
            $img2NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img2')->storeAs('public/cover_images',$img2NameToStore);


        }
        else{
            $img2NameToStore = 'noimage.jpg';
        }

        if($request->hasFile('img3'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img3')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img3')->getClientOriginalExtension();
            //file name to  store
            $img3NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img3')->storeAs('public/cover_images',$img3NameToStore);


        }
        else{
            $img3NameToStore = 'noimage.jpg';
        }

        if($request->hasFile('img4'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img4')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img4')->getClientOriginalExtension();
            //file name to  store
            $img4NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img4')->storeAs('public/cover_images',$img4NameToStore);


        }
        else{
            $img4NameToStore = 'noimage.jpg';
        }

        if($request->hasFile('img5'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img5')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img5')->getClientOriginalExtension();
            //file name to  store
            $img5NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img5')->storeAs('public/cover_images',$img5NameToStore);


        }
        else{
            $img5NameToStore = 'noimage.jpg';
        }

        


        $profucts = new Product();
        $profucts-> user_id = Auth::id();
        $profucts->name = $request->input('name');
        $profucts->os = $request->input('os');
        $profucts->weight = $request->input('weight');
        $profucts->color = $request->input('color');
        $profucts->screen = $request->input('screen');
        $profucts->build = $request->input('build');
        $profucts->resolution = $request->input('resolution');
        $profucts->dimension = $request->input('dimension');
        $profucts->status = $request->input('status');
        $profucts->price = $request->input('price');
        $profucts->expandable = $request->input('expandable');
        $profucts->RAM = $request->input('RAM');
        $profucts->ROM = $request->input('ROM');
        $profucts->number_of_cores = $request->input('numberofcores');
        $profucts->SoC = $request->input('SoC');
        $profucts->CPU = $request->input('CPU');
        $profucts->GPU = $request->input('GPU');

        $profucts->img1 = $img1NameToStore;
        $profucts->img2 = $img2NameToStore;
        $profucts->img3 = $img3NameToStore;
        $profucts->img4 = $img4NameToStore;
        $profucts->img5 = $img5NameToStore;

        $profucts->featurues = $request->input('featurues');
        $profucts->vedio = $request->input('vedio');
        $profucts->primary = $request->input('primary');
        $profucts->secondary = $request->input('secondary');
        $profucts->battery = $request->input('battery');
        $profucts->charging = $request->input('charging');
        $profucts->wifi = $request->input('wifi');
        $profucts->internet = $request->input('internet');
        $profucts->USB = $request->input('USB');
        $profucts->bluetooth = $request->input('bluetooth');
        $profucts->radio = $request->input('radio');
        $profucts->sensors = $request->input('sensors');
        $profucts->first_arrival = $request->input('firstarrival');
        $profucts->manufacturedby = $request->input('manufacturedby');
        $profucts->SIM = $request->input('SIM');
        $profucts->other_features = $request->input('other_features');



        $profucts->save();

        $profucts->category()->attach($request->categories);
        return back()->with('status','post created');
    }


    public function productdetails($id){
        $product = Product::findOrFail($id);
        $products = Product::all();
        return view('admin.viewproduct')->with('product',$product)->with('products',$products);

    }

    public function productedit($id){
        $product = Product::findOrFail($id);
        $products = Product::all();
        $categories = Category::all();
        return view('admin.editproducts')->with('product',$product)->with('products',$products)->with('categories',$categories);

    }


    public function productupdate(Request $request,Product $profucts){

        

        //file upload
        //file upload
        if($request->hasFile('img1'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img1')->getClientOriginalExtension();
            //file name to  store
            $img1NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img1')->storeAs('public/cover_images',$img1NameToStore);


        }
        

        if($request->hasFile('img2'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img2')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img2')->getClientOriginalExtension();
            //file name to  store
            $img2NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img2')->storeAs('public/cover_images',$img2NameToStore);


        }
        

        if($request->hasFile('img3'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img3')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img3')->getClientOriginalExtension();
            //file name to  store
            $img3NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img3')->storeAs('public/cover_images',$img3NameToStore);


        }
        
        if($request->hasFile('img4'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img4')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img4')->getClientOriginalExtension();
            //file name to  store
            $img4NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img4')->storeAs('public/cover_images',$img4NameToStore);


        }
        

        if($request->hasFile('img5'))
        {
            //get file name  with the  extension
            $filenameWithExt = $request->file('img5')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img5')->getClientOriginalExtension();
            //file name to  store
            $img5NameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img5')->storeAs('public/cover_images',$img5NameToStore);


        }
        


        $profucts-> user_id = Auth::id();
        $profucts->name = $request->input('name');
        $profucts->os = $request->input('os');
        $profucts->weight = $request->input('weight');
        $profucts->color = $request->input('color');
        $profucts->screen = $request->input('screen');
        $profucts->build = $request->input('build');
        $profucts->resolution = $request->input('resolution');
        $profucts->dimension = $request->input('dimension');
        $profucts->status = $request->input('status');
        $profucts->price = $request->input('price');
        $profucts->expandable = $request->input('expandable');
        $profucts->RAM = $request->input('RAM');
        $profucts->ROM = $request->input('ROM');
        $profucts->number_of_cores = $request->input('numberofcores');
        $profucts->SoC = $request->input('SoC');
        $profucts->CPU = $request->input('CPU');
        $profucts->GPU = $request->input('GPU');

        if($request->hasFile('img1')){
            $profucts->img1 = $img1NameToStore;
        }
        if($request->hasFile('img2')){
            $profucts->img2 = $img2NameToStore;
        }
        if($request->hasFile('img3')){
            $profucts->img3 = $img3NameToStore;
        }
        if($request->hasFile('img4')){
            $profucts->img4 = $img4NameToStore;
        }
        if($request->hasFile('img5')){
            $profucts->img5 = $img5NameToStore;
        }


        $profucts->featurues = $request->input('featurues');
        $profucts->vedio = $request->input('vedio');
        $profucts->primary = $request->input('primary');
        $profucts->secondary = $request->input('secondary');
        $profucts->battery = $request->input('battery');
        $profucts->charging = $request->input('charging');
        $profucts->wifi = $request->input('wifi');
        $profucts->internet = $request->input('internet');
        $profucts->USB = $request->input('USB');
        $profucts->bluetooth = $request->input('bluetooth');
        $profucts->radio = $request->input('radio');
        $profucts->sensors = $request->input('sensors');
        $profucts->first_arrival = $request->input('firstarrival');
        $profucts->manufacturedby = $request->input('manufacturedby');
        $profucts->SIM = $request->input('SIM');



        $profucts->save();

        $profucts->category()->sync($request->categories);
        return back()->with('status','Product Updated Successfully...');
    }

    public function productdelete(Request $request)
    {

        $products = Product::findOrFail($request->product_id);
        $products->delete();

        // toastr()->success('Room Deleted Successfully');
        return back()->with('status','Product Deleted Successfully...');

    }


    public function setting()
    {
        $settings = Setting::all();
        return view('admin.setting')->with('settings',$settings);

    }

    public function shippingcoststore(Request $request){

        $this->validate($request,[
            'shippingcost' => 'required'
      
            

        ]);



        $cost = new Setting();
        $cost->shipping_cost = $request->input('shippingcost');
        $cost->save();

        return back()->with('status','Shipping Cost Added...');
    }
}
