<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
  <h1>Create category</h1> 
  
  <form action="{{route('PublicCategories.store')}}" method="post">
  @csrf
 <label for="name">public category name :</label>
 <input type="text" name='name'><br><br>
 

 <input type="submit" value="submit">
</form> 
</body>
</html>