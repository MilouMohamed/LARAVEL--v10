<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     

<!-- <link rel="stylesheet" href="../../../style1.css">  -->
<!-- @ vite(["resources/css/app.css","resources/js/app.js"])  -->
@vite(["resources/js/app.js"]) 
    @props(["title"])
    <title>{{$title}}</title>
</head>

<body>
    @include("partials.nav")    
    <div class="countainer">


        <main>
           @include("partials.flashbag") 
            {{$slot}}
        </main>

    </div>
    @include ("partials.footer")

</body>

</html>