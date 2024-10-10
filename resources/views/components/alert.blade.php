@props(["type"])
<div>
   <div class="alert {{$type}}">
      <h3>{{$slot}}</h3>
   </div>

</div>
<style>
   .alert {
      width: 80%;
      padding: 12px;
      margin: 10px auto;
      height: max-content;
   }

   .danger {
      background-color: red;
   }

   .warning {
      background-color: orange;
   }

   .god {
      background-color: green;
   }
</style>