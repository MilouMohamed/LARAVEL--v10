<x-masterV15 title="Se Cennecter">
 
@error("login_error") 
<x-alert   type="warning">
    {{$message}}
</x-alert>
@enderror

    <form action="{{route("login.login")}}" method="post">
  @csrf
        <div class="ajouter-profile">
            <div class="row-item">
                <label for="login">Login : </label>
                <input type="text" name="login" placeholder="123@gmail.com" value="{{old("login")}}"  />
            </div>
            <div class="row-item">
                <label for="password">Password : </label>
                <input type="text" name="password" placeholder="password ici " value="123@gmail.com" />
            </div>


            <div class="row-item btn-div">
                <input type="submit" class="btn" value="Connection">
            </div>
        </div>
        @if ($errors->any())
        
        @foreach ($errors->all() as $error)
        <span class="alert alert-danger">
            {{$error}}
            </span>
            @endforeach
            @endif
    </form>


</x-masterV15>