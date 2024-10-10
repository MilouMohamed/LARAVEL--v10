<x-masterV15 title="Page Modifier Pub">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <h2>Page Modifier Une Publications</h2>
    <form action="{{ route("publication.update",$publication->id) }}" method="post" enctype="multipart/form-data">
        @csrf
         @method("put")
         
        <div class="ajouter-profile">
            <div class="row-item">
                <label for="titre">Title : </label>
                <input type="text" name="titre" placeholder="Titre  1" value="{{ old("titre",$publication->titre)}}" />
            </div>
            @error('titre')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class="row-item">
                <label for="body">Body : </label>
                <textarea name="body">
                    {{old("body",$publication->body)}} 
                </textarea>
            </div>

            @error('body')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class="row-item">
                <label for="image">Image : </label>
                <input type="file" name="image" placeholder="Pas D'image ">
            </div>
            <div class="row-item  "> 
                <img class="center-h" width="100" src="{{asset("storage/".$publication->image)}}" alt="No Image ICi ">
            </div>
            <div class="row-item btn-div">
                <input type="submit" class="btn" value="Modifier Pub">
            </div>
        </div>
    </form>
</x-masterV15>