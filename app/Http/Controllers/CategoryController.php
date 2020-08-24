<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function getCategories()
    {
        $categories = Category::get();
        $data['categories'] = $categories;
        return response()->json($data);
    }
    
    public function index()
	{
		$data['categories'] = Category::with('articles')->get();
		return response()->json($data);
    }
    
    public function store(Request $request)
	{
		$validate = \Validator::make($request->all(), [
		    'name' => 'required|unique:categories,name',
		    'thumbnail' => 'required|url',
        ]);
        
        if ($validate->fails()) {
            $data['status'] = 'Failed';
            $data['message'] = $validate->messages();
            return response()->json($data);
        }
        
        $insert = Category::create($request->all());
        if($insert){
            $data['status'] = 'Success';
            $data['message'] = 'Berhasil menambah category';
            return response()->json($data);
        }else{
            $data['status'] = 'Failed';
            $data['message'] = 'Gagal menambah category';
            return response()->json($data);
        }
    }
    
    public function destroy($id)
	{
		$category = Category::findOrFail($id);
		
        $category->delete();
        
		$data['status'] = 'Success';
        $data['message'] = 'Berhasil menghapus category';
        return response()->json($data);
	}

}