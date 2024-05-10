<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
  <h1>Create Book</h1> 
  
  <form action="{{route('Book.store')}}" method="POST">
  @csrf
 <label for="name">Book name :</label>
 <input type="text" name='name'><br><br>
  <label for="sub">Sub Category :</label>
  <input type="text" name='sub_category_id'>
 <select name="category_id" id="">
  @foreach ($sub_categories as $sub_category)
  <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
@endforeach
</select><br><br>
<input type="submit" value="submit">
</form> 
</body>
</html>