<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Blogs;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogs::paginate(10);
        return view('auth.dashboard',compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validate the incoming request data
          $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            //'user_id' => 'required|exists:users,id',
        ]);

        // Create a new blog entry
        Blogs::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
        ]);

        // Redirect to the blogs index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   /**
 * Show the form for editing the specified blog.
 *
 * @param  int  $id
 * @return \Illuminate\View\View
 */
    public function edit($id)
    {
        
        $blog = Blogs::findOrFail($id);

       
        return view('blogs.edit', compact('blog'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $blog = Blogs::findOrFail($id);
    
        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
    
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blogs::findOrFail($id);   
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
    
    public function myPosts(){
        $user_id = Auth::user()->id;
        $blogs = Blogs::where('user_id',$user_id)->paginate(10);
        return view('blogs.myposts',compact('blogs'));
    }
}
