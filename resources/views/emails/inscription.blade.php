<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/js/app.js"])

    <title>Email Profile</title>
</head>

<body>
    <div class="countainer">

        <div class="row">
            <img src={{asset("https://cdn-icons-png.flaticon.com/512/3135/3135715.png")}} alt="No Image Profile" width="200px">
            <div class="text text-center p-5">
                <h3>Name : {{$name}} /// Email : {{$email}}</h3>
                 <h4>{{str_repeat("--",20)}}</h4>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-primary" href="{{$href}}">Confermation</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger" href="#">Annulation</a>
                </div>
            </div>
        </div>
        <!-- v72 
    <div class="row">
      <div class="col-md-3">
     One: { { $ body}}
      </div>
      <div class="col-md-3">
   Two :   { { $ body}}
      </div>
      <div class="col-md-3">
     Three : { {$ body}}
      </div>
      <img src="https://canarymail.io/blog/wp-content/uploads/2023/11/Gmail-Generators.webp" alt="No iimmgg Email" width="200px">
    </div>
    <hr>
-->

        <hr>
        <div>
            &copy; 2024
        </div>
    </div>

</body>

</html>