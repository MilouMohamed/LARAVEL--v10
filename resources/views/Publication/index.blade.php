<!-- @extends ("layout.master")  -->

<x-masterv15 title="Page Profiles">

    <hr />
    <h1>Page Profile ici</h1>

    <div class="pub-content">
        @foreach ($publications as $publication)   
            <x-PubCard  :publication="$publication" />
           
        @endforeach
    </div>

    <div class="pagination_prof">
        {{$publications->links()}}
    </div>
    <hr />
    <br>



    <hr />
    <br>

</x-masterv15>