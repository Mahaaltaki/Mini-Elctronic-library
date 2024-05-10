<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Books</title>
 <script>

 </script>
</head>
<body 
  > 
    <h1>All Books</h1>
   
    <a href={{route('Book.create')}}>Add Books</a><br><br>

    {{-- <form action="{{route('search_book')}}" method="GET">
        @csrf
        search:<input type="text" name="find" placeholder="book-name"> 
        <input type="submit" value="search">
    </form> --}}
    <table border="1">
        <tr>
         <td>book index</td>
         <td>book name</td>
        <td>sub category</td>
     </tr>
     @foreach ($list_Books as $book)
     <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$book->name}}</td>
        <td>{{$book->sub_id}}</td>
        </td>
     </tr>
         
     @endforeach
    </table>
</body>
</html>