{{-- Mon cmntaire --}}
<!-- Mon cnt html -->
{{-- @include ("partials.nav") --}}
<x-masterv15  title="Home Page 01 1" >
<h2>Page Visite ({{  $lastCompteur[0][0]}}."".{{  $lastCompteur[0][1]}}."".{{  $lastCompteur[0][2]}}) Fois</h2>

<x-alert type="danger"    >  mesag <s>ICI </s>Erroroo ici de text  </x-alert>
<x-alert type="god"  > mesag <s>ICI </s>C Est Bon    </x-alert>

<div id="root"></div>
<!-- < x -usersTable nom=" this Le nom1 this" : users="$users" /> -->
 
</x-masterv15>


{{--
@extends("layout.master") 

@section("title")
Mon titre HOME
@endsection

@section("section-1")

<h1>From View home ici HOME PAGE</h1>

<x-alert type="danger"    >  mesag <s>ICI </s>Erroroo ici de text  </x-alert>
<x-alert type="god"  > mesag <s>ICI </s>C Est Bon    </x-alert>
<x-usersTable nom=" this Le nom1 this" :users="$users" />

@php
    $n3 = $n1 + $n2;
@endphp
<h1>La sommes est {{$n3}} ce traitement il faut ajouter dans controller</h1>

@endsection
{{--

@switch($color)
@case("red")
<p>Is Red</p>
@break
@case("black")
<p>black</p>
@break
@default
<p>Not Exist</p>
@break
@endswitch


<?php 
$pre=null;
?>

@empty($pre)
<h2>Is Yes empty</h2>
@endempty

@isset($pre)
<h2>Is Yes isset Existe dans La memeoir and not null</h2>
@endisset


<h2>-----------------------</h2>
<h2>
    <?= //$nom;?> || blade || {{$nom}}
</h2>
<h2>-----------------------</h2>

<?php //foreach ($langs as $lng):?>
<ul>
    <li>
        <?= //$lng ?>
    </li>
</ul>
<?php //endforeach; ?>

<h2>-----------------------</h2>
<h1>Avce Balad</h1>
<h2>-----------------------</h2>
<table border="2" width="90%">
    @if (count($langs) > 0)

    <thead>
        <tr>
            <th>nbr</th>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($langs as $lng=>$vl)
        <tr>
            <td>{{$lng}}</td>
            <td>{{$vl}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
--}}
<!-- 
<h1>From View home ici HOME PAGE</h1>
<h2> </h2> 
 -->