<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use Auth;
use Validator;

class AdminBlogsController extends Controller
{
    public function construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(8);
        return view('admin/blog/index', ['blogs' => $blogs]);
    }

    public function search(Request $request)
    {
      if($request->has('keyword')) {
        $blogs = Blog::where('title', 'like', '%' .$request->get('keyword').'%')->paginate(8);
      }
      else{
        $blogs = Blog::paginate(8);
      }
      return view('admin/blog/index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function new()
    {
      return view('admin/blog/new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'title' => 'required',
          'caption' => 'required',
        ]);

        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->caption = $request->caption;

        if ($request->blog_image != null){
          $blogImage = time(). '.jpg';
          $request->blog_image->storeAs('public/blog_images', $blogImage);
          $blog->blog_image = $blogImage;
        }

        $blog->save();
        return redirect('admin/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($blog_id)
    {
        $blog = Blog::where('id', $blog_id)->firstOrFail();
        return view('admin/blog/show' ,compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($blog_id)
    {
        $blog = Blog::where('id', $blog_id)->firstOrFail();
        return view('admin/blog/edit' ,compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id)
    {
        $validator = Validator::make($request->all(), [
          'title' => 'required|string|max:255',
          'caption' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $blog = Blog::where('id', $blog_id)->firstOrFail();
        $blog->title = $request->title;
        $blog->caption = $request->caption;

        if ($request->Blog_image != null){
            $blogImage = time(). '.jpg';
            $request->Blog_image->storeAs('public/blog_images', $blogImage);
            $blog->blog_image = $blogImage;

            $deleteBlogImage = Blog::find($request->id);
            $deleteBlogName = $deleteBlogImage->blog_image;
            Storage::delete('public/blog_images'. $deleteBlogName);
        }

        $blog->save();
        return redirect('admin/blogs/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_id)
    {
        if(Blog::where('id', $blog_id))
        {
          $deleteBlogImage = Blog::where('id', $blog_id)->firstOrFail();
          $deleteName = $deleteBlogImage->blog_image;

          if (Storage::exists('public/blog_images/', $deleteName))
             {
                 Storage::delete('public/blog_images/' . $deleteName);
             }

              $blog = Blog::where('id', $blog_id)->firstOrFail();
              $blog->delete();

              return redirect('/admin/blogs/');
          }else
          {
              return redirect('/admin/');
          }
    }
}
