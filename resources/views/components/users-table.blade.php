@props(["nom","users"])
<h1>---------- ---------- ---------- ---------</h1>
<h1>From Component user </h1>
<table border="3px  ">

    <thead >
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>METIE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user["id"]}}</td>
            <td>{{$user["nom"]}}</td>
            <td>{{$user["metie"]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    
 Lorem : {{$nom}}
</div>
<h1>---------- ---------- ---------- ---------</h1>
