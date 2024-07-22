<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;
use App\Http\Requests\StoreAuterRequest;
use Exception;
use Illuminate\Support\Facades\File;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::all();
        return view('admin.authors.index', compact('authors'));
    }



    public function create()
    {
        return view('admin.authors.create');
    }


    public function store(StoreAuterRequest $request)
    {


        try {
                Authors::create([
                    'name' => $request->name,
                    'des' => $request->des,

                ]);
            }

        catch (Exception $e) {
            return back()->withErrors(['errors'=>'Something Happend']);
        }



        // ========= طريقتي برفع الصور وباقي الشغلات =========
        // $name   = $request->name;
        // $description = $request->des;

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images/authors_images/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";

        //     $check = Authors::create([
        //         'name'        => $name,
        //         'description' => $description,
        //         'image'       => $profileImage

        //     ]);

        //     if ($check) {
        //         return redirect(route('dashboard.authors.index'));
        //     } else {

        //         return 'error';
        //     }

        // }else{

        //     $check = Authors::create([
        //         'name'        => $name,
        //         'description' => $description,

        //     ]);

        //     if ($check) {
        //         return redirect(route('dashboard.authors.index'));
        //     } else {

        //         return 'error';
        //     }

        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Authors::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request);
        $name        = $request->name;
        $description = $request->description;

        $check = Authors::find($id);

        $check->name = $name;
        $check->description = $description;


        if ($image = $request->file('image')) {
            $destinationPath = 'images/authors_images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $check->image = $profileImage;
        $check->save();

        if ($check) {
            return redirect(route('dashboard.authors.edit', $check->id));
        } else {

            return 'error';
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authors = Authors::find($id);
        $authors->blogs()->whereId($id)->delete();
        $authors->delete();
        return redirect(route('dashboard.authors.index'))->with('success', 'Blogs deleted successfully.');
    }

    // public function destroy(string $id)
    // {
    // $authors = Authors::find($id);
    // if ($authors->has('blogs')) {
    //     $authors->delete();
    // }
    //     $authors->delete();
    //     return redirect(route('dashboard.authors.index'))->with('success', 'Blogs deleted successfully.');
    // }
}
