<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENT-Books | @yield ('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Rubik+Vinyl&display=swap" rel="stylesheet">
</head>
<style>
    .main{
        height: 100vh;
    }

    .sidebar{
        background-color:#3A8891;
    }

    .sidebar a{
        text-decoration: none;
        padding:  20px 30px;
        color: white;
        display: block;
    }

    .sidebar a:hover{
        background-color: #7FE9DE;
    }

    .sidebar a.active{
        background-color: #7FE9DE;
        border-right: solid 5px  #0E5E6F;
    }

    .container{
        font-family: 'Cookie', cursive;
        font-family: 'Rubik Vinyl', cursive;
        font-size: 20px;
    }

    .navbar-brand{
    font-size: 30px;
    }

    .books{
        background-color: #7FFFD4;
    }
    .category{
        background-color: #FF9987;
    }
    .user{
        background-color: #FFB671;
    }

    .card-data{
        border-radius: 5px;
        padding: 20px 30px;
        border: solid 1px;
        color:#ffffff;
    }

    .card-data i{
        font-size: 40px;
    }

    .desc{
        font-size: 20px;
    }

    .count{
        font-size: 20px;
    }
</style>
<body>
<div class="main d-flex flex-column justify-content-between">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0E5E6F">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="bi bi-book-half"></i> RENT-Books</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
  </div>
</nav>

<div class="body-main h-100">
    <div class="row g-0 h-100">
        <div class="col-lg-2  sidebar collapse d-lg-block" id="navbarSupportedContent">
            @if(Auth::user()->rols_id == 1)
            <a href="/dashboard" @if(request()->route()->uri == 'dashboard')class='active' @endif)><i class="bi bi-house-gear"></i> Dashboard</a>
            <a href="/user" @if(request()->route()->uri == 'user')class='active' @endif)><i class="bi bi-person-circle"></i> User</a>
            <a href="/category" @if(request()->route()->uri == 'category')class='active' @endif)><i class="bi bi-bookmarks"></i> Category</a>
            <a href="/books" @if(request()->route()->uri == 'books')class='active' @endif)><i class="bi bi-book"></i> Books</a>
            <a href="/rent_logs" @if(request()->route()->uri == 'rent_logs')class='active' @endif)><i class="bi bi-cart"></i> Rent Logs</a>
            <a href="/logout" class="bi bi-box-arrow-left"> Logout</a>     
            @else 
            <a href="/profile" class="bi bi-person-circle"> Profile</a>
            <a href="/logout" class="bi bi-box-arrow-left"> Logout</a>
            @endif
        </div>
        <div class="col-lg-10 p-4 content">
        @yield('content')
        </div>
    </div>
</div>
</div>
@yield('countent')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>