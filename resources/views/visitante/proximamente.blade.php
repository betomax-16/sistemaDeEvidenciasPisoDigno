@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<style media="screen">
  h1{
    color: #a4a4a3;
    margin-top: 5%;
  }
</style>
@endsection @section('content')
  <div class="container espacioPagina marco">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4 text-md-center">Próximamente!!!</h1>
      </div>
    </div>
  </div>
 @include('layouts/menu/footer')
@endsection @section('javascripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('#donar').addClass('active');
  });
</script>
@endsection
