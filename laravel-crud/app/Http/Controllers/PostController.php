<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// php artisan make:controller PostController --resource 
class PostController extends Controller
{
	public function index()
	{
		$posts = Post::all();

		return $posts;
	}

	public function create() // Exibe página web contendo um formulário
	{
		$post = new Post();

		$post->title = 'Meu Segundo Post';
		$post->content = 'Conteúdo qualquer';
		$post->author = 'Kobs';

		$post->save();
	}
	public function store(Request $request)
	{
		// Recebe o POST do formulário presente na página exibida por create()
		//Inserção no banco
	}

	public function show(string $id)
	{
		$post = new Post();
		$post = $post->find($id);

		return $post;
	}

	public function edit(string $id) // Exibe a view com o formulário de edição
	{
	}

	public function update(Request $request, string $id) // Altera no banco
	{
		$posts = Post::find($id)->update([
			'author' => 'Alessandro',
			'title' => 'Desconhecido'
		]);

		return $posts;
	}

	public function destroy(string $id)
	{
		$post = Post::find($id)->delete();
		return $post;
	}
}
