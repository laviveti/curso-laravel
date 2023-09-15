<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function create(Request $request)
	{
	}

	public function read(Request $request)
	{
	}

	public function all()
	{
	}

	public function update(Request $request)
	{
	}

	public function delete(Request $request)
	{
		$post = Post::where('id', '>', 0)->delete();
		return $post;
	}
}
