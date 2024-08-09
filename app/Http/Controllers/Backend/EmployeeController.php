<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class EmployeeController extends Controller
{
    public function AllEmployee(){
        $employee=Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));
    }

    public function AddEmployee(){
        return view('backend.employee.add_employee');
    }

    public function StoreEmployee(Request $request){
        $validaData = $request->validate([
            'name'=>'required|max:200',
            'email'=>'required|unique:employees|max:200',
            'phone'=>'required|max:200',
            'address'=>'required|max:400',
            'salary'=>'required|max:200',
            'vacation'=>'max:200',


        ]);

        $defaultImage = 'upload/no_image.jpg';

        if($request->file('image')){
            $getImage= $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$getImage->getClientOriginalExtension();
            $img = $manager->read($getImage);
            $img = $img->resize(300,300);

            $img->toJpeg(80)->save(base_path('public/upload/employee/'.$name_gen));
            $save_url = 'upload/employee/'.$name_gen;
        } else {
            $save_url=$defaultImage;
        }
        Employee::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'salary'=>$request->salary,
            'vacation'=>$request->vacation,
            'city'=>$request->city,
            'image'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);

    }

    public function EditEmployee($id){

        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit_employee',compact('employee'));

    }

    // update

    public function UpdateEmployee(Request $request){


        $employee_id = $request->id;

        if($request->file('image')){
            $getImage= $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$getImage->getClientOriginalExtension();
            $img = $manager->read($getImage);
            $img = $img->resize(300,300);
            $img->toJpeg(80)->save(base_path('public/upload/employee/'.$name_gen));
            $save_url = 'upload/employee/'.$name_gen;

            Employee::findOrFail($employee_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'salary'=>$request->salary,
                'vacation'=>$request->vacation,
                'city'=>$request->city,
                'image'=>$save_url,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Employee Updated Successfully',
                'alert-type' => 'success'
            );

        } else {
            Employee::findOrFail($employee_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'salary'=>$request->salary,
                'vacation'=>$request->vacation,
                'city'=>$request->city,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Employee Updated Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('all.employee')->with($notification);
    }

    // delete

    public function DeleteEmployee($id){

        $employee_img = Employee::findOrFail($id);
        $img = $employee_img->image;

        if ($img !== 'upload/no_image.jpg' && file_exists($img)) {
            unlink($img);
        }

        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Employee Delete Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.employee')->with($notification);
    }
}
