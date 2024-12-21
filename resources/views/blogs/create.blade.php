<form action="/blogs" method="POST">
    @csrf
    <h1>Create Blogs</h1>
    <label>Title</label>
    <input type="text" name="title">
    <label>Content</label>
    <textarea name="content"></textarea>
    <input type="submit" value="Submit">
</form>