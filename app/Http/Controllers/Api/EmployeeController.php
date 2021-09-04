<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployRequest;
use App\Models\Employe;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employ = Employe::select('id', 'first_name', 'last_name', 'email', 'phone', 'company_id')->get();
        return response()->json($employ);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Employe::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company_id,
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
        try{
            Employe::where('id',$request -> id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company_id,
            ]);

            return $this -> returnSuccessMessage('تم التسجيل بنجاح');
        }catch (\Exception $e){
            return $this ->  returnError($e->getMessage(), 'place try again to check  the date');
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
        //
    }


    public function deleteEmployee(Request $request)
    {

        try{
            Employe::where('id',$request -> id)->delete();

            return $this -> returnSuccessMessage('تم الحذف بنجاح');
        }catch (\Exception $e){
            return $this ->  returnError($e->getMessage(), 'place try again to check  the date');
        }

    }
}
