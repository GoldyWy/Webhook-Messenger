<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Article;
use Illuminate\Http\Request;

class WebviewController extends Controller {
    
    public function list(Request $request, $category) {
        $data['category'] = Category::findOrFail($category);
        $data['list'] = Article::with('category')
            ->where('category_id', $category)
            ->get();
        return view('webview.list', $data);
    }
    
    public function detail(Request $request, $category, $article) {
        $data['data'] = Article::with('category')
            ->where('category_id', $category)
            ->where('id', $article)
            ->first();
        
        if ($data == null) {
            abort(404);
        }
        
        return view('webview.detail', $data);
    }

}
