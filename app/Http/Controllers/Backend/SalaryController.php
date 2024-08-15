<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdvanceSalary;
use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
{
    //

    public function AllAdvanceSalary(){

        $salary = AdvanceSalary::latest()->get();

        return view('backend.salary.all_advance_salary', compact('salary'));
    }


    public function AddAdvanceSalary(){

        $employee = Employee::latest()->get();
        $currentDate = Carbon::now('Asia/Manila')->format('F j, Y');

        return view('backend.salary.add_advance_salary', compact('employee','currentDate'));
    }

    public function StoreAdvanceSalary(Request $request){
        $validate = $request->validate([

            'employee_id'=> 'required|exists:employees,id',
            'date'=>'required|date',
            'advance_salary'=>'required|numeric|max_digits:6'

        ]);

        AdvanceSalary::insert([
            'employee_id'=>$request->employee_id,
            'date'=>$request->date,
            'advance_salary'=>$request->advance_salary,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Advance Salary Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.advance.salary')->with($notification);
    }
}
