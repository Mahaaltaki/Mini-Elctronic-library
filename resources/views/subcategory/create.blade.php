<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
  <h1>Create category</h1> 
  
  <form action="{{route('subCategory.store')}}" method="post">
  @csrf
 <label for="name"> Sub Category name :</label>
 <input type="text" name='name'><br><br>
 <label for="name">   public Category name :</label>
 <input type="text" name='pub-name'>
 <select name="category_id" id="">
  @foreach ($pubcategories as $pubcategory)
  <option value="{{$pubcategory->id}}">{{$pubcategory->name}}</option>
@endforeach
</select><br><br>
 

 <input type="submit" value="submit">
</form> 
</body>
</html>