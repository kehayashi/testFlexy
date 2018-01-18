@extends('template_main')

@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit"></i> Editar
      <small>Produto</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        @if(isset($stored))
          @if($stored == true)
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Produto editado com sucesso!</h4>
                  </div>
                  <!-- end alert -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
         @endif
        @endif

        @if(isset($stored))
          @if($stored == false)
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-close"></i> Erro ao editar produto!</h4>
                  </div>
                  <!-- end alert -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
         @endif
        @endif

        @if(isset($filesize))
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-close"></i> Tamanho da foto deve ser menor que 5MB!</h4>
                  </div>
                  <!-- end alert -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        @endif

        @if(count($errors) > 0)
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                  </div>
                  <!-- end alert -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        @endif

        <form action="update_store_product" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="box box-primary" style="background-color: #f2f2f2;">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                </div>
                <!-- end col -->
                <div class="col-md-5">
                  <img src="/public/{{ $product->image }}"/>
                </div>
                <!-- end col -->
                <div class="col-md-4">
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-lg-12">
                  <input type="hidden" name="id_product" value="{{ $product->id_product }}" />
                  <b>Título</b><br>
                  <input type="text" class="form-control" name="title" placeholder="Título do produto" value="{{ $product->title }}">
                  <br />
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-lg-12">
                  <b>Descrição</b><br>
                  <textarea class="form-control" name="description" placeholder="Descrição do produto" rows="9" value="">{{ $product->description }}</textarea>
                  <br />
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-lg-12">
                  <b>Estoque</b><br>
                  <input type="text" class="form-control" name="stock" placeholder="100" value="{{ $product->stock }}"/>
                  <br />
                  <br />
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-lg-12">
                  <b>Imagem</b><br>
                  <input type="file" class="form-control" name="image" accept="image/png,image/gif,image/jpeg"/>
                  <br />
              </div>
              <!-- end col -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-lg-12">
                  <b>Tags</b><br>
                  <select class="form-control select2 select2-hidden-accessible" name="tags[]" id="tags" multiple="" data-placeholder="Selecione tags" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($tags as $t)
                      <option value="{{ $t->id_tag }}">{{ $t->name }}</option>
                    @endforeach
                  </select>
                  <label>Em uso:</label>
                  @foreach($tagsProduct as $t)
                    <small class="label label-warning"> {{ $t->name }},</small>
                  @endforeach
                  <br />
              </div>
              <!-- end col -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-lg-12">
                  <br />
                  <button type="submit" class="form-control btn btn-success">Alterar produto  <i class="fa fa-check"></i></button>
                  <span
              </div>
              <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end box-body -->
          </div>
          <!-- end box-primary -->
        </form>
        <!-- end form -->
       </div>
       <!-- end col -->
     </div>
     <!-- end row -->
   </section>
   <!-- end section -->

  <script src="{{ asset("/bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

  <!-- SELECT COM BUSCA -->
  <script>
    $(function () {
      $(".select2").select2();
    });
  </script>
  <!-- END SELECT COM BUSCA-->

@stop

<!-- /.content-wrapper -->
