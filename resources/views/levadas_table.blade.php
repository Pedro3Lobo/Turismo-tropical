@extends('layouts.app')
@section('content')
@include('includes.message-block')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class='box-title'></i><b> Levadas</b></h4>
      </div>
      <div class="panel-body">
        <div class='row-fluid'>
          <div id="postBody"></div>
              <table id="example" class=' table-bordered table-striped' class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>ID Levadas</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Duração</th>
                  <th>Dificuldade</th>
                  <th>Preço</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <form>
                  @foreach($levada as $levadas)
                   <tr>
                      <td>{{ $levadas->id}}</td>
                      <td>{{ $levadas->name}}</td>
                      <td>{{ $levadas->descricao}}</td>
                      <td>{{ $levadas->duracao}}</td>
                      <td>{{ $levadas->dificuldade}}</td>
                      <td>{{ $levadas->preco}}&euro;</td>
                      <td>
                      <a href='#' type='button'class='btn btn-info btn-xs' onclick="type_docs_ver(this)" id="{{ $levadas->id}}" data-toggle="modal" data-target="#ModalVer"><span><i class='fa fa-eye' aria-hidden='true'></i></span></a>
                      <a href='#' type='button'class='btn btn-warning btn-xs'onclick="edit_type_docs(this)" name="{{$levadas->id}}" ><span><i class='fa fa-pencil' aria-hidden='true'></i></span></a>
                      <a href="#" type='button'class='btn btn-danger btn-xs' onclick="type_docs_apagar(this)" name="{{ $levadas->id}}"><span><i class='fa fa-trash' aria-hidden='true'></i></span></a></td>
                   </tr>
                   <input  id="type_docs{{ $levadas->id}}" value="{{ $levadas->id}}"  style="display: none">
                   <input  id="name{{ $levadas->id}}" value="{{ $levadas->name}}"  style="display: none">
                   <input  id="descricao{{ $levadas->id}}" value="{{ $levadas->descricao}}"  style="display: none">
                   <input  id="duracao{{ $levadas->id}}" value="{{ $levadas->duracao}}"  style="display: none">
                   <input  id="dificuldade{{ $levadas->id}}" value="{{ $levadas->dificuldade}}"  style="display: none">
                   <input  id="preco{{ $levadas->id}}" value="{{ $levadas->preco}}"  style="display: none">
                 @endforeach
               </form>
               </tbody>
            </table>
          </div>
          <div class=''>
            <a href='#' data-toggle="modal" data-target="#myModal"  class='btn btn-success date_doc'>
              <i class='fa fa-plus'></i> Novo Levada
            </a>
          </div>
        </div
          <!-- /.box-body -->
      </div>
    </div>
  </div>
  <div class="col-md-2">
  </div><!-- /.box -->
</div>


<!-- Modal Para Inserir-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b> Inserir Levada</b></h4>
      </div>
      <form class="form-group" id="type_form_inser" action="#" method="post">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Levada: </label><br>
                <input type='text' class='form-control'  required='required' name='nome_inser' id='nome_inser' placeholder='Nome da Levada: 'required='required'>
                
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Levada: </label><br>
                 <textarea class="form-control" required='required' name='descricao_inser' id='descricao_inser' rows="5" id="comment"  placeholder="Descrição da Levada..."></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Duração da Levada: </label><br>
                <input type='time' class='form-control'  required='required' name='duracao_inser' id='duracao_inser' placeholder='Duração da Levada:' required='required'>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dificuldade da Levada: </label><br>
                <input  type="radio" name="dificuldade_inser" value="Facil" checked> Facil
                <input  type="radio" name="dificuldade_inser" value="Médio"> Médio
                <input  type="radio" name="dificuldade_inser" value="Difícil">Difícil
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Preço da Levada: </label><br>
                <input type="number" class='form-control'  required='required' name='preco_inser' id='preco_inser' placeholder='Preço da Levada' required='required'>
                
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" id="_user" value="" >
          <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
          <a type="button"class="btn btn-primary" id="btn_type_inser" onclick="type_inser_submit(this)" ><i class="fa fa-check" aria-hidden="true"></i> Confirmar</a>
          <button type="button" class="btn btn-warning" data-dismiss="modal" ><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Modal Para Editar-->
<div class="modal fade" tabindex="-1" id="ModalEdit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Tipo Documento</h4>
      </div>
      <form class="form-group" id="type_form_edi" action="#" method="post">
      <div class="modal-body">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome do Tipo de Doc: </label><br>
                <input type='text' class='form-control'  required='required' name='type_doc_edit' id='type_doc_edit'placeholder='Nome do Departamento: 'required='required'>
                
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="text" id="id_type_doc" name="id_type_doc" style="display: none" >
          <input type="text" name="_token"  value="{{ csrf_token() }}" style="display: none" >
          <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
          <button type="submit" id="btn_type_edit" data-dismiss="modal" class="btn btn-primary">Guardar Mudanças</button>
        </div>
      </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div>

<div class="modal fade" tabindex="-1" id="ModalVer" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ver Tipo de Doc</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome do Tipo de Doc: </label><br>
                <input type='text' class='form-control'  required='required' id='type_doc' placeholder='Tipo Doc: 'required='required' disabled>
                
              </div>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="Apagar_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="#" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apagar Tipo de Doc</h4>
        </div>
        <div class="modal-body">
          <h4>Tem a certesa que quer apagar este Tipo Doc???</h4>
          <ul>
            <li>
              Todos os documentos que fazem parte deste Tipo Doc irão ser apagado.
            </li>
          </ul>
          <input  id="apagar_type_doc" name="apagar_type_doc"  style="display: none">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Apagar</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script  type="text/javascript">
  var token = '{{Session::token()}}';
  var id;
  var name;
  var descricao;
  var duracao;
  var dificuldade;
  var preco;

 function type_docs_ver(elem) {
        event.preventDefault();
        tipo =document.getElementById('type_docs'+elem.id).value
        document.getElementById('type_doc').value=tipo;
  }
  function type_docs_apagar(vari) {
       event.preventDefault();
       $("#Apagar_modal").modal();
       document.getElementById('apagar_type_doc').value=vari.name;
  }


  function edit_type_docs(elem) {
         event.preventDefault();
         $("#ModalEdit").modal();
         name =document.getElementById('type_docs'+elem.name).value
         document.getElementById('type_doc_edit').value=name;
         document.getElementById('id_type_doc').value=elem.name;
   }

    function type_inser_submit(elem) {
      name=document.getElementById('nome_inser').value;
      descricao=document.getElementById('descricao_inser').value;
      preco=document.getElementById('preco_inser').value;
      //console.log("Pedro"+name);
      name=name.replace(/\s/g,'');
      descricao=descricao.replace(/\s/g,'');
      preco=preco.replace(/\s/g,'');
      if(name==""){
       // console.log("Falhou");
      }else{
        document.getElementById("type_form_inser").submit();
        //console.log("Flag1");
        document.getElementById("btn_type_inser").style.display = 'none';
      }
     }

</script>
@stop
