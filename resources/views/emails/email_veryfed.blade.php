<x-masterV15 title="Email verification Profile">
    <div class="container"> 
        <h2> Hi {{$name}}</h2>
        @if ($msg)
        
        <div class="alert alert-warning"> 
            <h3> {{$msg}}</h3>
        </div>
        @else
        <hr>
        <div class="alert alert-success">
            Your Email {{$email}} Have been Verifed ...
        </div>
        @endif
        
    </div>
</x-masterV15>