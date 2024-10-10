<nav class="mavigation">
  
<div class="logo-brand">
LARAVEL 
@auth
{{auth()->user()->id}} || 
{{auth()->user()->email}}
@endauth
</div>
<div class="links">

<span><a href={{route("home")}}>Home</a></span>
<span><a href={{route("publication.edit",1)}}>Edit 1</a></span>
@auth
<span><a href={{route("logout")}}>Dec</a></span> 
@endauth
@guest
    <span><a href={{route("login.show")}}>Cnct</a></span>
    @endguest
    <span><a href="api/profiles">API res</a></span>

    <span><a href={{route("profiles.index")}}>Profs  </a></span>
    <span><a href={{route("settings.index")}}>Infos  </a></span>
    <span><a href={{route("profiles.create")}}>Ajou Prf</a></span>
@auth
<span><a href={{route("publication.create")}}>Ajou Pub</a></span>
@endauth
    <span><a href={{route("publication.index")}}>All Pub</a></span>
</div>
    
</nav>

@once
<script>
   // alert("Is ok From Navigator");
</script>
@endonce