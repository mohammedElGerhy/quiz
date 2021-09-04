<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployRequest;
use App\Models\company;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company::get();
        $employees = Employe::paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = company::get();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployRequest $request)
    {
        try {

            Employe::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company_id,
            ]);
            return redirect()->route('employee.index')->with(['success' => 'success save']);

        }catch (\Exception $e){
            return redirect()->back()->with(['error' => 'errors save']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = company::get();
        $employee = Employe::findOrfail($id);
        return view('employees.edit', compact('employee','companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployRequest $request, $id)
    {
        try {
            Employe::findOrFail($request->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company_id,
            ]);

            return redirect()->route('employee.index')->with(['success' => 'success update']);

        }catch (\Exception $e){
            return redirect()->back()->with(['error' => 'errors save']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Employe::findOrFail($id)->delete();
            return redirect()->route('employee.index')->with(['success' => 'success delete']);

        }catch (\Exception $e){
            return redirect()->back()->with(['error' => 'errors']);

        }
    }
}
