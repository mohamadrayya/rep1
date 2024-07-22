<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Blogs;
use Illuminate\Http\Request;


class BlogsController extends Controller
{

    public function index()
    {
        $blogs = Blogs::with('author')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $authors = Authors::all();
        return view('admin.blogs.create', compact('authors'));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|string|max:255|min:10',
            'content' => 'required|string|min:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',

        ]);

        $title   = $request->title;
        $content = $request->content;
        $author_id = $request->resoureceName;

        if ($image = $request->file('image')) {
            $destinationPath = 'images/blogs/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";


            $check = Blogs::create([
                'title'     => $title,
                'content'   => $content,
                'image'     => $profileImage,
                'author_id' => $author_id
            ]);
    
            if ($check) {
                return redirect(route('dashboard.blogs.index'));
            } else {
    
                return 'error';
            }

        }else{
            $check = Blogs::create([
                'title'     => $title,
                'content'   => $content,
                // 'image'     => $profileImage,
                'author_id' => $author_id
            ]);
    
            if ($check) {
                return redirect(route('dashboard.blogs.index'));
            } else {
    
                return 'error';
            }
        }

    }






    public function show(string $id)
    {
        $blog = Blogs::findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }


    public function edit(string $id)
    {
        $blog = Blogs::findOrFail($id);
        $authors = Authors::all();
        return view('admin.blogs.edit', compact('blog', 'authors'));
    }


    public function update(Request $request, string $id)
    {

        // dd($request);
        $title   = $request->title;
        $content = $request->content;
        $author_id = $request->resoureceName;

        $check = Blogs::find($id);

        $check->title = $title;
        $check->content = $content;
        $check->author_id = $author_id;

        if ($image = $request->file('image')) {
            $destinationPath = 'images/blogs/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $check->image = $profileImage;

        $check->save();

        if ($check) {
            return redirect(route('dashboard.blogs.edit', $check->id));
        } else {

            return 'error';
        }
    }


    public function destroy(string $id)
    {
        $blogs = Blogs::find($id);
        $blogs->delete();
        return redirect(route('dashboard.blogs.index'))->with('success', 'Blogs deleted successfully.');
    }
}
