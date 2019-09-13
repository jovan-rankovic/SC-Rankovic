<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('id')->paginate(2);
        return view('back.pages.admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('back.pages.admin.posts.create');
    }


    public function store(PostRequest $request)
    {
        $image = $request->image;

        if($image->isValid())
        {
            $imgFolder = 'images/post/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            Post::create([
                'title' => $request->title,
                'content' => $request->contentP,
                'user_id' => $request->user_id,
                'image' => $imgFolder.$imgName
            ]);
        }

        return redirect('/admin/posts');
    }


    public function show(Post $post)
    {
        $socials = Social::all();
        return view('front.pages.post', compact('post','socials'));
    }


    public function edit(Post $post)
    {
        return view('back.pages.admin.posts.edit', compact('post'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $image = $request->image;

        if($image->isValid())
        {
            if(File::exists(public_path().'/'.$post->image))
            {
                File::delete(public_path().'/'.$post->image);
            }

            $imgFolder = 'images/post/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            $post->update([
                'title' => $request->title,
                'content' => $request->contentP,
                'user_id' => $request->user_id,
                'image' => $imgFolder.$imgName
            ]);
        }

        return redirect('/admin/posts');
    }


    public function destroy(Post $post)
    {
        if(File::exists(public_path().'/'.$post->image))
        {
            File::delete(public_path().'/'.$post->image);
        }

        Post::where(request(['id']))->delete();
    }


    public function pagination(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::latest('id')->paginate(4);

            return view('front.partials.home.pagination.posts', compact('posts'));
        }

        return abort(404);
    }
}
