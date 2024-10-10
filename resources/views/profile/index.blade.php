 <!-- @extends ("layout.master")  -->

<x-masterv15 title="Page Profiles" > 
 
@props(["profilles"])
<hr />
<h1>Page Profile ici</h1> 
 
<div class="profile-content">
    @foreach ($profilles as $prfl) 
        <x-ProfileCard  :prfl="$prfl" />
         
    @endforeach 
</div>

<div class="pagination_prof">
    {{$profilles->links()}}
</div>
<hr />
<br>
 
<hr />
<br>
 
</x-masterv15>