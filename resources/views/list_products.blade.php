@extends('template_main')

@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-search"></i> Pesquisa
      <small>Produtos</small>
    </h1>
  </section>
  <br>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        @if(isset($deleted))
          @if($delete = true)
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Produto excluído com sucesso!</h4>
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

        @if(isset($deleted))
          @if($delete = false)
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Erro ao excluir produto!</h4>
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

        <div class="box box-primary" style="background-color: #f2f2f2;">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list-ol"></i> Produtos cadastrados
                <small>pesquisa por: codigo do produto, título do produto e descrição</small>
              </h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                          <tr role="row" style="background-color: #222d32;">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 296.71875px; color: #f2f2f2;">Codigo do produto
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 296.71875px; color: #f2f2f2;">Imagem
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361.03125px; color: #f2f2f2;">Título do produto
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 321.546875px; color: #f2f2f2;">Descrição
                            </th>
                            <th colspstyle="width: 256.453125px;" style="width: 40px; color: #f2f2f2;">Editar
                            </th>
                            <th colspstyle="width: 256.453125px;" style="width: 40px; color: #f2f2f2;">Excluir
                            </th>
                          </tr>
                        </thead>
                        <!-- end thead -->
                        <tbody>
                          @foreach ($products as $p)
                            <tr role="row" class="odd">
                              <td class="sorting_1"><span class="label label-info" style="font-size: 15px;">{{ $p->id_product }}</span></td>
                              <td class="sorting_1"><img src="/public/{{ $p->image }}" style="height:55px;width55px;"></td>
                              @if($p->title == '')
                                <td><i class="fa fa-exclamation-triangle"></i> NÃO CONSTA</td>
                              @endif
                              @if($p->title != '')
                                <td>{{ substr($p->title, 0, 40) }}...</td>
                              @endif
                              <td>{{ substr($p->description, 0, 40) }}...</td>
                              <td class="text-center">
                                <span class="label label-primary" style="font-size: 15px;">
                                  <a href="/update/loadProduct/{{ $p->id_product }}">
                                    <i class="fa fa-pencil" style="color: white;"></i>
                                  </a>
                                </span>
                              </td>
                              <td class="text-center">
                                <span class="label label-danger" style="font-size: 15px;">
                                  <!--<a href="/excluir/excluirFormulario/{{ $p->id_product }}">
                                    <i class="fa fa-close" style="color: white;"></i>
                                  </a>-->
                                  <a href="#" data-toggle="modal" id="{{ $p->id_product }}" onclick="idModal(this.id)">
                                    <i class="fa fa-trash-o" style="color: white;"></i>
                                  </a>
                                </span>
                              </td>
                            </tr>
                            <!-- end tr -->
                          @endforeach
                          <tfoot>
                            <tr>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                            </tr>
                            <!-- end tr -->
                          </tfoot>
                          <!-- end tfoot -->
                      </tbody>
                      <!-- end tbody -->
                    </table>
                    <!-- end table -->
                  </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end wrapper -->
          </div>
          <!-- end box-body -->
        </div>
        <!-- end box -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </section>
  <!-- end section -->
</div>
<!-- end tab-content -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle" style="color: #FFD700;"></i> <b>Confirmação</b></h4>
          </div>
          <!-- end modal-header -->
            <div class="modal-body">
              <h4 class="box-title text-center"></h4>
              <!-- end box-info -->
            </div>
            <!-- end modal-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Não, cancelar <i class="fa fa-close"></i></button>
              <a id="deleteProd"><button type="button" class="btn btn-success">Sim, excluir <i class="fa fa-check"></i></button></a>
            </div>
            <!-- end modal-footer -->
        </div>
        <!-- end modal-content -->
      </div>
      <!-- end modal-dialog -->
  </div>
  <!-- end modal -->

  <script>
    function idModal(id){
      var html = '<span class="label label-info" style="font-size: 16px;">'+ id +'</span>';
       $('.box-title').text('Deseja excluir propriedade de código: ');
       $('.box-title').append(html);
       $('#deleteProd').attr("href", "/delete/deleteProduct/"+id);
       $('#myModal').modal('show');
    }
  </script>

<script>
  $(function () {
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
		    	    "sEmptyTable": "Nenhum registro encontrado",
		    	    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    	    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		    	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		    	    "sInfoPostFix": "",
		    	    "sInfoThousands": ".",
		    	    "sLengthMenu": "_MENU_ resultados por página",
		    	    "sLoadingRecords": "Carregando...",
		    	    "sProcessing": "Processando...",
		    	    "sZeroRecords": "Nenhum registro encontrado",
		    	    "sSearch": "Pesquisar",
		    	    "oPaginate": {
		    	        "sNext": "Próximo",
		    	        "sPrevious": "Anterior",
		    	        "sFirst": "Primeiro",
		    	        "sLast": "Último"
		    	    },
		    	    "oAria": {
		    	        "sSortAscending": ": Ordenar colunas de forma ascendente",
		    	        "sSortDescending": ": Ordenar colunas de forma descendente"
		    	    }
		    	}
        });
  });
</script>

@stop

<!-- /.content-wrapper -->
