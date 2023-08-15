<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /*** List employee***/ 
    public function index()
    {
        $employee = Employee::latest()->paginate(5);
    
        return view('pages.home',compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /*** Add employee***/ 
    public function create()
    {
        return view('pages.create_employee');
    }

    /*** Save employee***/
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
        ]);
    
        Employee::create($request->all());
     
        return redirect()->route('home')
                        ->with('success','Employee created successfully.');
    }

    /*** Edit employee***/
    public function edit($id)
    {
        $emp = Employee::findOrFail($id);
        return view('pages.edit_employee',compact('emp'));
    }

    /*** Update employee***/
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
        ]);
        Employee::whereId($id)->update($validateData);
    
        return redirect()->route('home')
                        ->with('success','Employee updated successfully');
    }

    /*** Delete employee***/
    public function destroy($id)
    {
        Employee::whereId($id)->delete();
    
        return redirect()->route('home')
                        ->with('success','Employee deleted successfully');
    }
    /*** change status ***/
    public function changestatus(Request $request){
        $status = (['status'=> $request->status == 0?1:0]);
        $id = $request->id;

        $response = Employee::whereId($id)->update($status);
    
        echo $response;

    }
}
