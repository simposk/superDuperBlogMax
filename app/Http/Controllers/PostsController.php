<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Carbon\Carbon;


class PostsController extends Controller
{

	public function __construct() {
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	public function index() {
		$posts = Post::orderBy('created_at', 'desc')->get();
		$user = Auth::user();

		return view('posts.index', ['posts' => $posts, 'user' => $user]);
	}

	public function create() {

		// check if user logged in

		if(!Auth::check()) {
			return redirect()->route('login');
		}

		return view('posts.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required|unique:posts|min:5|max:255',
			'body'  => 'required',
		]);

		$post = new Post($request->all());

		$post->user_id = Auth::id();
		$post->save();
		return redirect()->route('posts.show', [$post->id]);
	}

	public function show($post) {
		$post = Post::find($post);
		$user = Auth::user();

		return view('posts.show', ['post' => $post, 'user' => $user]);
	}

	public function edit($id) {
		$post = Post::find($id);


		if(!$post->ownedBy(Auth::user())) {
			return redirect()->route('posts.show', [$post->id]);
		}

		return view('posts.edit', ['post' =>  $post]);
	}

	public function update(Request $request, $id) {
		$this->validate($request, [
			'title' => 'required|max:255',
			'body'  => 'required'
		]);

		$post = Post::find($id);

		if(!$post->ownedBy(Auth::user())) {
			return $this->unautohrized($request); 
		}

		$post->title = $request->title;
		
		$post->body = $request->body;

		$post->save();

		return redirect()->route('posts.show', [$post->id]);
	}

	public function unautohrized(Request $request) {
		if ($request->ajax()) {
            return respone(['message' => 'No way.'], 403);
        }   

        return redirect()->route('posts.index');
	}


	public function destroy($id) {
		$post = Post::find($id);
		$post->delete();
		return redirect()->route('posts.index');
	}

}
