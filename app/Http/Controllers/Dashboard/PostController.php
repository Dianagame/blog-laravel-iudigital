<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Post\PutRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
       /* if (!Gate::allows('index',$posts[0])) {
            abort(403);
        }*/

        return view('Dashboard.post.index', compact('posts'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id','title');
        $post = new Post();
        /* if (!Gate::allows('create',$posts)) {
            abort(403);
        }*/
       
        return view('dashboard.post.create', compact('categories','post'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $post = new Post($request->validated());
        $post->save();
        return to_route('posts.index')->with('status', "Nuevo post creado");
    }

    
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

   
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        /* if (!Gate::allows('update', $post)) {
            abort(403);
        } */
        $task = 'edit';
        return view('dashboard.post.edit', compact('categories', 'post', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = $filename = time().".".$data['image']->extension();
            $request->image->move(public_path('images/otro'), $filename);
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('status', 'Publicación actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        /* if (!Gate::allows('delete', $post)) {
            abort(403);
        } */
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Publicación eliminada');
    }
}
