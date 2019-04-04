<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {

		$posts = Post::where('is_deleted', '=', 0)->get();
    	
    	return view('post.index', compact('posts'));
    }

    public function view($id){

		if($id == "")
		{
			return redirect()->to(route('admin.posts'));
		}

    	$post = Post::where('id', '=', $id)->get();

    	if(empty($post))
    	{
    		return redirect()->to(route('admin.posts'));
    	}
         
            return view('post.view', compact('post'));
    }

    public function edit(Request $request, $id)
    {

    	if($id == "")
		{
			return redirect()->to(route('admin.posts'));
		}

        $post = Post::findOrFail($id);

        if(empty($post))
    	{
    		return redirect()->to(route('admin.posts'));
    	}

        if($request->isMethod('GET'))
        {
            return view('post.edit', compact('post'));
        }

        if($request->isMethod('POST'))
        {
            $request->validate([
			    'title' => 'required|string|max:255',
	            'summary' => 'required',
	            'description' => 'required',
			]);

			$post->title =  $request->get('title');
			$post->summary =  $request->get('summary');
			$post->description =  $request->get('description');
			if(auth()->user()->is_admin != 1){
				$post->user_id =  auth()->user()->id;
			}

			$post->save();

			return redirect()->to(route('admin.posts'));
        }

    }

    public function delete($id)
    {
        
    	if($id == "")
		{
			return redirect()->to(route('admin.posts'));
		}

        $post = Post::findOrFail($id);

        if(empty($post))
    	{
    		return redirect()->to(route('admin.posts'));
    	}

    	$post->is_deleted = 1;
    	$post->save();

    	return redirect()->to(route('admin.posts'));
    }

}
