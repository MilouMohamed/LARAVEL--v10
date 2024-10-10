<x-masterv15 title="Page Profile One">
    <h1>Page Info Profile N {{$profile->id}}</h1>

    <div class="countainer">
        <div class="proflie_info">

            <img src="{{asset("storage/$profile->image")}}" alt="Image Profile" />
            <h2>Num : {{$profile->id}} || Nom :
                {{$profile->name}}
            </h2>
            <a href="#">
                <h3>Email : {{$profile->email}}</h3>
            </a>
            <p>{{date_format(date_create($profile->created_at), "Y-m-d")}}</p>
            <p class="center-v">
                {{$profile->bio}}
            </p>

        </div>
        <div class="row">
            <div class="center-v">
                @foreach ($profile->publications as $publication)             
                    <x-PubCard   :publication="$publication" /> 
                @endforeach
            </div>
        </div>
    </div>
    <!-- :canUpdate="$pub->Profile_id === Auth::user()->id" -->
</x-masterv15>