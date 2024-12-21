<form action="{{ route('blogs.update', $blog->id) }}" method="POST">

    @csrf
    @method('PUT')

    <h1>Edit Blogs</h1>
    <label>Title</label>
    <input type="text" name="title" value="{{$blog->title}}">
    <label>Content</label>
    <textarea name="content">{{$blog->content}}</textarea>
    <input type="submit" value="Submit">
</form>