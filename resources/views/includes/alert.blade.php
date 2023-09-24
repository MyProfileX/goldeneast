<div class="alert alert-success" id="alert" 
style="text-align: center;">
   {{ session('success') }}
</div>

{{-- <div class="alert alert-warning" id="alert" 
style="text-align: center;">
   {{ session('warning') }}
</div> --}}

{{-- автоудаление алерта через n миллисекунд --}}
<script type="text/javascript">
   $("document").ready(function(){

      setTimeout(function()
      {
         $("#alert").remove();
      }, 3000);

   })
</script>