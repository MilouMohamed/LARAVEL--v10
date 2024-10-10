<div class="card-pub list">
   @php 
     $pub_prof = $publication->Profile_Pub 
@endphp

   <div class="btns">
      <!-- @ a uth    @ i f ($canUpdate)  v 62 -->
      <div class="btn_2">
         @can("update", $publication)
          <a class="btn_op_1" href="{{route("publication.edit", $publication->id)}}">Modifier</a>
       @endcan

         @can("delete", $publication)
          <form action="{{route("publication.destroy", $publication->id)}}" method="post">
            @csrf
            @method("delete")
            <button onclick="return confirm('Vous Voullez Supprimer {{$publication->titre}}')" class="btn_op_1"
               type="submit">Supprimer</button>
          </form>
       @endcan

      </div>
      <!-- @ endif       @ endauth  v 62 -->

      <div class="profile_de_pub">
         <img width="50px" src="{{ asset("storage/" . $pub_prof->image)}}" alt="Image Profile">
         <h2>Name :{{ $pub_prof->name}}</h2>
      </div>

      <h3><label>Numero :</label> {{$publication->id}} ||| <label>Titre :</label>
         {{Str::upper($publication->titre)}}
      </h3>

   </div>
   <p> <label>Body :</label> {{ Str::limit($publication->body, 300, "....")}}</p>

   @if(!is_null($publication->image))
      <div class="img">
        <img src="{{asset("storage/$publication->image")}}" alt="{{$publication->titre}}">
      </div>
   @endif
</div>