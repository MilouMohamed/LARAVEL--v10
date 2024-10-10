<x-masterV15 title="PAge Ajouter">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach 
    @endif
<h2>Page Edite</h2>

    <form  enctype="multipart/form-data" action="{{ route("profiles.update", $profile->id) }}" method="post"  >
        @csrf               
        @method("PUT")                  
        <div class="ajouter-profile">                
            <div class="row-item">
                <label for="name">Name : </label>
                <input type="text" name="name" placeholder="name 1" value="{{ old("name",$profile->name) }}" />
            </div>
            @error('name')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class ="row-item">
                <label for="email">Email : </label>
                <input type="text" name="email" placeholder="123@email.com" value="{{old("email",$profile->email)}}">
            </div>

            @error('email')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class="row-item">
                <label for="password">Password : </label>
                <input type="text" name="password" placeholder="0000"  >
            </div>
            <div class="row-item">
                <label for="password_confirmation">Confirmation Du Password : </label>
                <input type="text" name="password_confirmation" placeholder="0000"  >
            </div>
            <div class="row-item">
                <label for="bio"> Bio : </label>
                <textarea type="text" name="bio">
                {{old("bio",$profile->bio)}} 
        </textarea>
            </div>
            <div class="row-item">
                <label for="image">Image  : </label>
                <input type="file" name="image" placeholder="Image ici" >
            </div>
            <div class="row-item btn-div">
                <input type="submit" class="btn" value="Modifier">
            </div>
        </div>
    </form>
</x-masterV15>