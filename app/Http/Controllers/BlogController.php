<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
	protected $limit = 3;
    public function index(){
    	// $posts = Post::with('author')->orderBy('created_at','desc')->get();
    	// $posts = Post::with('author')->latest()->get();
    	// $posts = Post::with('author')->latestFirst()->paginate(3);
    	$posts = Post::with('author')->latestFirst()->simplePaginate($this->limit);
    	return view('blog.index', compact('posts'));
    }
}
