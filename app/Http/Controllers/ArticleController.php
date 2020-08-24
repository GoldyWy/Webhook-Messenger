<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Events\MyEvent;
use Illuminate\Support\Facades\Input;
use App\Article;
use Log;

class ArticleController extends Controller
{
    public function getArticle()
    {
        $data['articles'] = Article::with('category')->get();
        return response()->json($data);
    }

    public function destroy($id)
	{
		$article = Article::findOrFail($id);
		
        $article->delete();
        $data['status'] = "Success";
        $data['message'] = "Berhasil dihapus";
		
		return response()->json($data);
    }
    
    public function store(Request $request)
    {
        $validate = \Validator::make($request->all(), [
		    'title' => 'required',
		    'category_id' => 'required|exists:categories,id',
		    'short_description' => 'required',
		    'full_description' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->messages());
            $data['status'] = "Failed";
            $data['message'] = $validate->messages();
            return response()->json($data);
            // Log::info($validate->messages());
		}

        $req = $request->all();
        // Log::info($req);

        $insert = Article::create($req);
        if($insert){
            $data['status'] = "Success";
            $data['message'] = "Berhasil menyimpan article";
        }else{
            $data['status'] = "Failed";
            $data['message'] = "Gagal menyimpan article";
        }
        // Log::info("Response".$data);

        return response()->json($data);
    }
}