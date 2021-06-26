@if (Session::has('success'))
<script>
swal({
  title: "Good job!",
  text: "{{ Session::get('success') }}",
  icon: "success",
});
</script>
@endif

@if (Session::has('unsuccess'))
<script>
swal({
  title: "Sorry!",
  text: "{{ Session::get('unsuccess') }}",
  icon: "error",
});
</script>
@endif

@if(session('message')==='f')
      <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Credentials doesn't match
      </div>

@endif    