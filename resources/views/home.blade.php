@extends('template_main')

@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home"></i> Home
      <small>Produtos</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h4 style="background-color:#f7f7f7; font-size: 16px; padding: 7px 10px; margin-top: 0;">
          <label>Tags mais utilizadas:</label>
          @foreach ($topTags as $t)
            <small class="label label-warning"><i class="fa fa-thumbs-o-up"></i> {{ $t->name }}</small>
          @endforeach
        </h4>
        <br />
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        @foreach ($products as $p)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail" style="background-color: #f2f2f2;">
              <img src="public/{{ $p->image }}">
              <div class="caption">
                <h4><b>{{ substr($p->title, 0, 23) }}...</b></h4>
                <p>{{ substr($p->description, 0, 30) }}...</p>
                <p><a href="#" class="btn btn-sm btn-primary" role="button">VER MAIS</a></p>
              </div>
              <!-- end caption -->
            </div>
            <!-- end thumbnail -->
          </div>
          <!-- end col -->
        @endforeach
       </div>
       <!-- end col -->
     </div>
     <!-- end row -->
   </section>
   <!-- end section -->

  <script src="{{ asset("/bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>



@stop

<!-- /.content-wrapper -->
