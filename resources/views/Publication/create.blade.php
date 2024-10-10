<x-masterV15 title="Page Ajouter Pub">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <h2>Page Ajouter Des Publications</h2>
    <form action="{{ route("publication.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="ajouter-profile">
            <div class="row-item">
                <label for="titre">Title : </label>
                <input type="text" name="titre" placeholder="Titre  1" value="Titre Ici N 1" />
            </div>
            @error('titre')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class="row-item">
                <label for="body">Body : </label>
                <textarea name="body">
                    test test test test tes test tes test est ets test tes test est ets 
                    test test test test tes test tes test est ets 
                </textarea>
            </div>

            @error('body')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class="row-item">
                <label for="image">Image : </label>
                <input type="file" name="image" placeholder="Pas D'image ">
            </div>
            <div class="row-item btn-div">
                <input type="submit" class="btn" value="Ajouter">
            </div>
        </div>
    </form>
</x-masterV15>