<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function blog()
    {
        $blogs = Blog::where('user_id', Auth::guard('api')->user()->id)->get();
        return response()->json(['status' => 200, 'blogs' => $blogs]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::create([
            'user_id' => Auth::guard('api')->user()->id,
            'title' => request('title'),
            'description' => request('description')
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            Tag::create([
                'user_id' => Auth::guard('api')->user()->id,
                'tag' => $tag,
                'blog_id' => $blog->id
            ]);
        }

        return response()->json(['status' => 200, 'message' => 'Blogs Added Successfully']);
    }

    public function edit(Request $request)
    {
        $blog = Blog::where('id', request('id'))->first();
        $tags = Tag::where('blog_id', $request->id)->get();
        return response()->json(['status' => 200, 'blog' => $blog, 'tags' => $tags]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        Blog::where('id', request('id'))->update([
            'user_id' => Auth::guard('api')->user()->id,
            'title' => request('title'),
            'description' => request('description')
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            $checkTag = Tag::where('user_id', Auth::guard('api')->user()->id)->where('tag', $tag)->first();
            if (!$checkTag) {
                Tag::create([
                    'user_id' => Auth::guard('api')->user()->id,
                    'tag' => $tag,
                    'blog_id' => $request->id
                ]);
            }
        }
        $checkTags = Tag::where('user_id', Auth::guard('api')->user()->id)->where('blog_id', $request->id)->get();

        foreach ($checkTags as $gettag) {   
            if (in_array($tags, $gettag->tag)) {
                Tag::where('user_id', Auth::guard('api')->user()->id)->where('id', $gettag->id)->delete();
            }
        }

        return response()->json(['status' => 200, 'message' => 'Blogs Updated Successfully']);
    }
}
