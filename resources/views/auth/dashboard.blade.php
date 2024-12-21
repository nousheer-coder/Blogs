<h1>Welcome, {{ auth()->user()->name }}</h1>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
<a href="/blogs/create" >Create Post</a>
<a href="/my-posts" >My Posts</a>
@foreach($blogs as $blog)
<h1>{{$blog->title}}</h1>
<p>{{$blog->content}}</p>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <label>Add Comment</label>
    <textarea></textarea>
    <button type="submit">Save</button>
</form>
@endforeach
