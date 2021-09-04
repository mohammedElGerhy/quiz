<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = company::select('id', 'Name', 'email', 'logo')->get();
        return response()->json($company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                'logo' =>$name,
            ]);
            return $this -> returnSuccessMessage('تم التسجيل بنجاح');
        }catch (\Exception $e){
            return $this ->  returnError($e->getMessage(), 'place try again to check  the date');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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
        return $this -> returnSuccessMessage('تم التسجيل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        company::where('id',$request -> id)->delete();

    }

    public function deleteCompany(Request $request)
    {
        try{
        company::where('id',$request -> id)->delete();
        return $this -> returnSuccessMessage('تم الحذف بنجاح');

        }catch (\Exception $e){
        return $this ->  returnError($e->getMessage(), 'place try again to check  the date');
}
    }
}
