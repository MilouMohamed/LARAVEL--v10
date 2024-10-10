@props(["prfl"])
<div class="card-prof">

   <div class="img">
      <!-- <img src="./img/profile.JPG" alt="No Img"> -->
      <img src="{{asset("storage/$prfl->image")}}" alt="No Img">
   </div>
   <h3><label>Numero :</label> {{$prfl->id}} ||| <label>Name :</label>
      {{Str::upper($prfl->name)}}
   </h3>
   <p> <label>Email :</label> {{$prfl->email}}</p>
   <p><label>Bio :</label> {{Str::limit($prfl->bio, 70, " .. .. .. ")}}</p>
   <div class="btns">

      <a href="{{route("profiles.show", $prfl->id)}}">Profile</a>

      <form method="post" action="{{route("profiles.destroy", $prfl->id)}}">
         @csrf
         @method("DELETE")
         <input type="submit" value="Supprimer">
      </form>

      <form action="{{route("profiles.edit", $prfl)}}" method="get">
         @csrf
         <input type="submit" value="Modifier"> 
      </form>

   </div>

</div>