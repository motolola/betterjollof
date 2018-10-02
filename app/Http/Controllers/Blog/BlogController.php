<?php

namespace App\Http\Controllers\Blog;


use App\Models\Blog;
use App\Services\BlogSlug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BlogController extends Controller {

    public function index()
    {
        $data['blogs'] = Blog::all();
        return view('blog.home', $data);
    }

    public function blogpage(Blog $blog)
    {
        $data['blog'] = $blog;
        return view('blog.page', $data);
    }
    public function addBlog()
    {
        if (!Auth::check()) {
            return redirect(url('/'));
        }
        return view('blog.create');
    }

    public function addAction(Request $request)
    {
        $blog          = new Blog();
        $blog->title   = $request->title;
        $blog->body    = $request->body;
        $blog->user_id = Auth::user()->id;
        $blog->slug    = (new BlogSlug())->createSlug($request->title);
        $blog->save();

        Flash('New blog created', 'success');
        return redirect(url('blog/preview/'.$blog->slug));
    }

    public function preview(Blog $blog)
    {
        if ($blog->user_id !== Auth::user()->id){
            Flash('You are not authorised to view this resource', 'warning');
            return redirect(url('profile/'.Auth::user()->username));
        }
        $data['blog'] = $blog;
        return view('blog.preview', $data);
    }

    public function editBlog(Blog $blog)
    {
        $data['blog'] = $blog;
        return view('blog.edit', $data);
    }

    public function editAction(Request $request, Blog $blog)
    {
        $this->middleware('auth');
        if ($blog->user_id != Auth::user()->id){
            Flash('You are attempting to edit a resource not belong to you', 'warning');
            return redirect(url('/profile/'.Auth::user()->username));
        }

        $blog->title   = $request->title;
        $blog->body    = $request->body;
        $blog->slug    = (new BlogSlug())->createSlug($request->title);
        $blog->published = $request->published;
        $blog->save();

        Flash('You have successfully edited this blog', 'success');
        return redirect(url('blog/'. $blog->slug));
    }

    public function publish(Blog $blog)
    {
        $this->middleware('auth');
        if ($blog->user_id != Auth::user()->id){
            Flash('You are attempting to edit a resource not belong to you', 'success');
            return redirect(url('/profile/'.Auth::user()->username));
        }
        $blog->published = 1;
        $blog->save();
        Flash('Blog published', 'success');

        return redirect(url('blog/'.$blog->slug));
    }

    public function deleteBlog(Blog $blog)
    {
        if ($blog->user_id !== Auth::user()->id){
            Flash('You are not authorised to delete this blog', 'danger');
            return redirect(url('profile/'.Auth::user()->username));
        }

        $blog->delete();
        Flash('Blog deleted', 'success');
        return redirect(url('profile/'.Auth::user()->username));
    }

}