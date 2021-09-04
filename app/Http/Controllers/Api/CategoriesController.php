<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Categorie;
class CategoriesController extends Controller
{
    use GeneralTrait;

    public function index (){
$categories = Categorie::select('id', 'name_'.app()->getLocale())->get();
//return response()->json($categories);
        return $this -> returnData('categories',$categories);

    }


    public function getCategoryById(Request $request)
    {

        $category = Categorie::select()->find($request->id);
        if (!$category)
            return $this->returnError('001', 'هذا القسم غير موجد');

        return $this->returnData('categroy', $category);
    }

    public function changeStatus(Request $request)
    {
        //validation
        Categorie::where('id',$request -> id) -> update(['active' =>$request ->  active]);

        return $this -> returnSuccessMessage('تم تغيير الحاله بنجاح');

    }
}
