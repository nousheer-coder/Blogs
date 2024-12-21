<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>My Posts</h1>

<table id="customers">
  <tr>
    <th>Title</th>
    <th>Content</th>
    <th>Actions</th>
  </tr>
    @foreach($blogs as $blog)
    <td>{{$blog->title}}</td>
    <td>{{$blog->content}}</td>
    <td><a href="/blogs/{{$blog->id}}/edit">edit</a>
    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
    @csrf
    @method('DELETE')

    <button type="submit">Delete Blog</button>
</form>
    </td>
    @endforeach
</table>

</body>
</html>