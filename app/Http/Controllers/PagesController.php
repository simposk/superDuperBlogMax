<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;


class PagesController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['except' => ['getIndex', 'getAbout', 'getContact']]);
    }

    public function getIndex() {
        return view('pages.welcome');
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function getDashboard() {
    	// get posts where user_id equals current logged in user
    	$posts = Post::where('user_id', Auth::user()->id)->get();

    	return view('pages.dashboard', ['posts' => $posts]);

    }
}
