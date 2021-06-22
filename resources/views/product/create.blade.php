<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
     <div class="container">
         @if(\Illuminate\Support\Facades\Session::get('msg'))
             <div class="alert alert-success">
                 {{ Session::get('msg') }}
             </div>
         @endif
         <form action="/add" method="post" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                 <label for="exampleInputEmail1">Product Name</label>
                 <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
                 @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Product Price</label>
                 <input type="text" class="form-control" name="price" placeholder="Enter price" value="{{ old('price') }}">
                 @error('price')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">Description</label>
                 <input type="text" class="form-control" name="description"  placeholder="Enter desc" value="{{ old('description') }}">
                 @error('description')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="form-group">
                 <label for="exampleFormControlFile1">Image</label>
                 <input type="file" class="form-control-file" id="" name="image">
             </div>
             <button type="submit" class="btn btn-primary">Save</button>
         </form>
     </div>
</body>
</html>
