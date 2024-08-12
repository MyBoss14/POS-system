<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SupplierController extends Controller
{
    public function AllSupplier(){
        $supplier=Supplier::latest()->get();
        return view('backend.supplier.all_supplier',compact('supplier'));
    }

    public function AddSupplier(){
        return view('backend.supplier.add_supplier');
    }

    public function StoreSupplier(Request $request){
        $validaData = $request->validate([
            'name'=>'required|max:200',
            'email'=>'required|unique:suppliers|max:200',
            'phone'=>'required|max:200',
            'address'=>'required|max:400',
            'shop_name'=>'required',
            'type'=>'required|max:200',
        ]);

        $defaultImage = 'upload/no_image.jpg';

        if($request->file('image')){
            $getImage= $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$getImage->getClientOriginalExtension();
            $img = $manager->read($getImage);
            $img = $img->resize(300,300);

            $img->toJpeg(80)->save(base_path('public/upload/supplier/'.$name_gen));
            $save_url = 'upload/supplier/'.$name_gen;
        } else {
            $save_url=$defaultImage;
        }
        Supplier::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'shop_name'=>$request->shop_name,
            'type'=>$request->type,
            'account_holder'=>$request->account_holder,
            'account_number'=>$request->account_number,
            'bank_name'=>$request->bank_name,
            'bank_branch'=>$request->bank_branch,
            'city'=>$request->city,
            'image'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Supplier Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);

    }

    public function EditSupplier($id){

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.edit_supplier',compact('supplier'));

    }

    // update

    public function UpdateSupplier(Request $request){


        $supplier_id = $request->id;

        if($request->file('image')){
            $getImage= $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$getImage->getClientOriginalExtension();
            $img = $manager->read($getImage);
            $img = $img->resize(300,300);
            $img->toJpeg(80)->save(base_path('public/upload/supplier/'.$name_gen));
            $save_url = 'upload/supplier/'.$name_gen;

            Supplier::findOrFail($supplier_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'shop_name'=>$request->shop_name,
                'type'=>$request->type,
                'account_holder'=>$request->account_holder,
                'account_number'=>$request->account_number,
                'bank_name'=>$request->bank_name,
                'bank_branch'=>$request->bank_branch,
                'city'=>$request->city,
                'image'=>$save_url,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Supplier Updated Successfully',
                'alert-type' => 'success'
            );

        } else {
            Supplier::findOrFail($supplier_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'shop_name'=>$request->shop_name,
                'type'=>$request->type,
                'account_holder'=>$request->account_holder,
                'account_number'=>$request->account_number,
                'bank_name'=>$request->bank_name,
                'bank_branch'=>$request->bank_branch,
                'city'=>$request->city,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Supplier Updated Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('all.supplier')->with($notification);
    }

    // delete

    public function DeleteSupplier($id){

        $supplier_img = Supplier::findOrFail($id);
        $img = $supplier_img->image;

        if ($img !== 'upload/no_image.jpg' && file_exists($img)) {
            unlink($img);
        }

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Supplier Delete Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.supplier')->with($notification);
    }

    //  details
    public function DetailsSupplier($id){
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.details_supplier', compact('supplier'));
    }
}
