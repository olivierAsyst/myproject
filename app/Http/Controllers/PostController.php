<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function create(): View
    {
        return view('blog.create');
    }
    public function index(): View
    {
        // for ($i=0; $i < 11; $i++) {
        //     $post = new Post();
        //     $post->title = "Mon ".$i."e"." post";
        //     $post->slug = "mon-".$i."-post";
        //     $post->content = "Contenu de mon ".$i." post";
        //     $post->save();

        //     return $post;
        // }

        // $posts = Post::all(['id', 'title']);
        // $posts = Post::find(id: 13);
        // $posts = Post::findOrFail( 12);
        // $posts = Post::paginate(4, ['id', 'title', 'content']);
        // $posts = Post::where('id', '>', 2)->first();
        // $posts = Post::where('id', '>', 2)->limit(1)->get();
        // $post = Post::find(12);
        // $post->title = "Mon dernier post modifiée";
        // $post->save();

        // $post = Post::where('id', '>', 1)->delete();

        // $post = Post::create([
        //     'title' => "Mon tout dernier article ajouté",
        //     'slug' => "mon-tout-dernier-article-ajoute",
        //     'content' => "Les contenus de mon tout dernier article ajouté"
        // ]);

        // $validator = Validator::make([
        //     'title' => 'ss'
        // ],[
        //     'title' => 'required|min:5'
        // ]);
        // dd($validator->errors());
        // dd($postFilterRequest->validated());

        $post = Post::paginate(4, ['id', 'title', 'content', 'slug']);
        return view('blog.index',[
            'posts' => $post
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View
    {
        //dd($post);
        //$post = Post::findOrFail($post);
        if($post->slug != $slug){
            return to_route('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id
            ]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
