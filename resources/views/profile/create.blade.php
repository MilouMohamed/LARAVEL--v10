<x-masterV15 title="Page Ajouter">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach 
    @endif


    <form action="{{ route("profiles.store") }}" method="post"  enctype="multipart/form-data" >
        @csrf
        <div class="ajouter-profile">
            <div class="row-item">
                <label for="name">Name : </label>
                <input type="text" name="name" placeholder="name 1" value="{{ old("name") }}" />
            </div>
            @error('name')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class ="row-item">
                <label for="email">Email : </label>
                <input type="text" name="email" placeholder="123@email.com" value="email ---">
            </div>

            @error('email')
                <x-alert type="danger"> {{$message}} </x-alert>
            @enderror

            <div class="row-item">
                <label for="password">Password : </label>
                <input type="text" name="password" placeholder="0000" value="pas 000">
            </div>
            <div class="row-item">
                <label for="password_confirmation">Confirmation Du Password : </label>
                <input type="text" name="password_confirmation" placeholder="0000" value="pas 000">
            </div>
            <div class="row-item">
                <label for="bio"> Bio : </label>
                <textarea type="text" name="bio">
 Bio is here bal bla bla bla bal bla bla bla  bal bla bla bla bal bla bla bla  bal bla bla bla bal bla bla bla 
        </textarea>
            </div>
            <div class="row-item">
                <label for="image">Image  : </label>
                <input type="file" name="image" placeholder="Image ici" >
            </div>
            <div class="row-item btn-div">
                <input type="submit" class="btn" value="Ajouter">
            </div>
        </div>
    </form>
</x-masterV15>