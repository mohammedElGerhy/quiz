<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company::get();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        try {
        if($request->hasfile('logo'))
        {
            $public_path = 'public/companies';
                $name = $request->logo->getClientOriginalName();
           $path =  $request->file('logo')->storeAs($public_path,$name);

            }
        company::create([
            'Name' => $request->Name,
            'email' => $request->email,
            'logo' => $name,
        ]);
        return redirect()->route('company.index')->with(['success' => 'success save']);
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
        $company = company::findOrfail($id);
        return  view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        try {
        DB::beginTransaction();
            company::findOrFail($request->id)->update([
                'Name' => $request->Name,
                'email' => $request->email,
            ]);
        if($request->hasfile('logo'))
        {
            $public_path = 'public/companies';
            $name =  $request->logo->getClientOriginalName();
            $path =  $request->file('logo')->storeAs($public_path,$name);
            $company = company::findOrFail($request -> id);
            $company->logo = $name;
            $company->save();
        }
        DB::commit();
            return redirect()->route('company.index')->with(['success' => 'success update']);
        }catch (\Exception $e){
        DB::rollback();
            return redirect()->back()->with(['error' => 'errors']);

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
            $image = company::findOrFail($id);
            if (! empty($image ->logo)){
                $photo = Str::after($image->logo, 'public\storage\companies\\' );
                $photo = base_path('public\storage\companies\\' .  $photo);
                unlink($photo);
            }
            company::findOrFail($id)->delete();
            return redirect()->route('company.index')->with(['success' => 'success delete']);
       }catch (\Exception $e){
            return redirect()->back()->with(['error' => 'errors']);
        }
    }
}
