<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function show(Post $post){

        // Post::findorFail($id);
        return view('blog-post', ['post'=>$post]);
    }

    public function index(){

        $posts = auth()->user()->posts()->paginate(2);

        return view('admin.posts.index', ['posts' =>$posts]);
    }

    public function create(){

        return view('admin.posts.create');
    }

    public function store(Request $request){

        $inputs = request()->validate([
            'title'=>'required| min:8 |max:255',
            'post_image'=>'file',
            'body'=>'required'

        ]);

        if(request('post_image')){

            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        $request->session()->flash('new-post-msg', 'New post created successfully!');

        return redirect()->route('post.index');
    }

    public function edit(Post $post){

        $this->authorize('view', $post); // View policy implementation

        return view('admin.posts.edit', ['post'=>$post]);

    }

    public function update(Post $post){
        // Input validation
         $inputs = request()->validate([
            'title'=>'required| min:8 |max:255',
            'post_image'=>'file',
            'body'=>'required'

        ]);



        if(request('post_image')){

            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image =$inputs['post_image'];
        }

            $post->title = $inputs['title'];
            $post->body = $inputs['body'];

        $this->authorize('update', $post); // update post policy implementation
       $post->save();
        Session::flash('edit-post-msg', 'Post was edited!');

        return redirect()->route('post.index');

    }

    public function destroy(Post $post){
        $this->authorize('delete', $post); // Delete post policy implementation

        $post->delete();
        Session::flash('message', 'Post was deleted!');
        return back();
    }
}
