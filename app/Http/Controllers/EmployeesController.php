<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Employees::latest()->paginate(5);

        return view('employees.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        Employees::create($request->all());

        return redirect()->route('employees.index')
                        ->with('success','Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $product)
    {
        return view('employees.show',compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $product)
    {
        return view('employees.edit',compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
                        ->with('success','employee deleted successfully');
    }
}
