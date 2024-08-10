<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CustomerController extends Controller
{
    //All customer

    public function AllCustomer(){
        $customer=Customer::latest()->get();
        return view('backend.customer.all_customer',compact('customer'));
    }

    // add customer

    public function AddCustomer(){
        return view('backend.customer.add_customer');
    }

    // store

    public function StoreCustomer(Request $request){
        $validaData = $request->validate([
            'name'=>'required|max:200',
            'email'=>'required|unique:customers|max:200',
            'phone'=>'required|max:200',
            'address'=>'required|max:400',



        ]);

        $defaultImage = 'upload/no_image.jpg';

        if($request->file('image')){
            $getImage= $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$getImage->getClientOriginalExtension();
            $img = $manager->read($getImage);
            $img = $img->resize(300,300);

            $img->toJpeg(80)->save(base_path('public/upload/customer/'.$name_gen));
            $save_url = 'upload/customer/'.$name_gen;
        } else {
            $save_url=$defaultImage;
        }
        Customer::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'shop_name'=>$request->shop_name,
            'account_holder'=>$request->account_holder,
            'account_number'=>$request->account_number,
            'bank_name'=>$request->bank_name,
            'bank_branch'=>$request->bank_branch,
            'city'=>$request->city,
            'image'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification);

    }

    // Edit
    public function EditCustomer($id){

        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit_customer',compact('customer'));

    }

    // update

    public function UpdateCustomer(Request $request){


        $customer_id = $request->id;

        if($request->file('image')){
            $getImage= $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$getImage->getClientOriginalExtension();
            $img = $manager->read($getImage);
            $img = $img->resize(300,300);
            $img->toJpeg(80)->save(base_path('public/upload/customer/'.$name_gen));
            $save_url = 'upload/customer/'.$name_gen;

            Customer::findOrFail($customer_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'shop_name'=>$request->shop_name,
                'account_holder'=>$request->account_holder,
                'account_number'=>$request->account_number,
                'bank_name'=>$request->bank_name,
                'bank_branch'=>$request->bank_branch,
                'city'=>$request->city,
                'image'=>$save_url,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );

        } else {
            Customer::findOrFail($customer_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'shop_name'=>$request->shop_name,
                'account_holder'=>$request->account_holder,
                'account_number'=>$request->account_number,
                'bank_name'=>$request->bank_name,
                'bank_branch'=>$request->bank_branch,
                'city'=>$request->city,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('all.customer')->with($notification);
    }

    // delete

    public function DeleteCustomer($id){

        $customer_img = Customer::findOrFail($id);
        $img = $customer_img->image;

        if ($img !== 'upload/no_image.jpg' && file_exists($img)) {
            unlink($img);
        }

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Customer Delete Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.customer')->with($notification);
    }
}
