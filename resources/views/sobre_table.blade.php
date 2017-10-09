@extends('layouts.app')
@section('content')
@include('includes.message-block')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class='box-title'></i><b>Informações da Empresa</b></h4>
      </div>
      <div class="panel-body">
        <div class='row-fluid'>
          <div id="postBody"></div>

              <table id="example" class=' table-bordered table-striped' class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>ID Info</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Descrição</th>
                  <th>Tel</th>
                  <th>Localização</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <form>
                  @foreach($sobre as $sobres)
                   <tr>
                      <td>{{ $sobres->id}}</td>
                      <td>{{ $sobres->name}}</td>
                      <td>{{ $sobres->email}}</td>
                      <td><?php echo substr( $sobres->descricao,0,50); ?></td>
                      <td>{{ $sobres->tel}} </td>
                      <td>{{ $sobres->sitio}}</td>
                      <td>
                         <!-- /.btn ver -->
                        <a href='#' type='button' class='btn btn-info btn-xs' onclick="info_ver(this)" id="{{ $sobres->id}}" data-toggle="modal" data-target="#ModalVer"><span><i class='fa fa-eye' aria-hidden='true'></i></span></a>
                        <!-- /.btn ver -->
                        <!-- /.btn editar -->
                        <a href='#' type='button' class='btn btn-warning btn-xs'onclick="edit_info(this)" id="{{ $sobres->id}}" ><span><i class='fa fa-pencil' aria-hidden='true'></i></span></a>
                        <!-- /.btn editar -->
                      </td>
                   </tr>
                   <input  id="name{{ $sobres->id }}" value="{{ $sobres->name }}"  style="display: none">
                   <input  id="email{{ $sobres->id }}" value="{{ $sobres->email }}"  style="display: none">
                   <input  id="descricao{{ $sobres->id }}" value="{{ $sobres->descricao }}"  style="display: none">
                   <input  id="tel{{ $sobres->id }}" value="{{ $sobres->tel }}"  style="display: none">
                   <input  id="sitio{{ $sobres->id }}" value="{{ $sobres->sitio }}"  style="display: none">
                 @endforeach
               </form>
               </tbody>
            </table>
          </div>
        </div
          <!-- /.box-body -->
      </div>
    </div>
  </div>
  <div class="col-md-2">
  </div><!-- /.box -->
</div>
<!-- Modal Para Editar-->
<div class="modal fade" tabindex="-1" id="ModalEdit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b>Editar Info</b></h4>
      </div>
      <form class="form-group"  action="{{route('info')}}" method="post" novalidate>
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Info: </label><br>
                <input type='text' class='form-control'  required='required' name='name' id='name'  placeholder='Nome da Empresa: ' >
                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Email da Empresa: </label><br>
                <input type='email' class='form-control'  required='required' name='email' id='email'  placeholder='Email da Empresa: ' >
                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Empresa: </label><br>
                 <textarea class="form-control" required='required' name='descricao'  rows="5" id="descricao"  placeholder="Descrição da Levada..."></textarea>
              </div>
            </div>
           
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Localização da Empresa: </label><br>
                <input  type="text" min="1" step="any"  class='form-control'  required='required' name='localizacao' id='localizacao' placeholder='Localizacao: ' >
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Telefone da Empresa: </label><br>
                <input  type="number"   class='form-control'  required='required' name='tel' id='tel' placeholder='Telefone: ' >
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="text" id="id" name="id" style="display: none" >
          <input type="text" name="_token"  value="{{ csrf_token() }}" style="display: none" >
          <button type="submit" id="btn_type_edit"  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Guardar Mudanças</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
        </div>
      </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <div class="modal fade" tabindex="-1" id="ModalVer" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b> Ver Info</b></h4>
      </div>

        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Info: </label><br>
                <input type='text' class='form-control'    id='name_ver'  placeholder='Nome da Empresa: ' disabled>
                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Email da Empresa: </label><br>
                <input type='email' class='form-control'  id='email_ver'  placeholder='Email da Empresa: ' disabled>
                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Empresa: </label><br>
                 <textarea class="form-control"  rows="5" id="descricao_ver"  placeholder="Descrição da Levada..." disabled></textarea>
              </div>
            </div>
           
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Localização da Empresa: </label><br>
                <input  type="text" min="1" step="any"  class='form-control'  id='localizacao_ver' placeholder='Localizacao: '  disabled>
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Telefone da Empresa: </label><br>
                <input  type="number"   class='form-control'   id='tel_ver' placeholder='Telefone: ' disabled>
              </div>
            </div>
            </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div>

<script  type="text/javascript">
  var token = '{{Session::token()}}';
  var id;
  var name;
  var descricao;
  var email;
  var tel;
  var sitio;

  function edit_info(elem) {
        event.preventDefault();
        $("#ModalEdit").modal();

        name =document.getElementById('name'+elem.id).value;
        tel=document.getElementById('tel'+elem.id).value;
        email =document.getElementById('email'+elem.id).value;
        descricao=document.getElementById('descricao'+elem.id).value;
        sitio=document.getElementById('sitio'+elem.id).value;
        
        document.getElementById('name').value= name;
        document.getElementById('tel').value=tel;
        document.getElementById('email').value=email;  
        document.getElementById('descricao').value=descricao;
        document.getElementById('localizacao').value=sitio;
        document.getElementById('id').value=elem.id;
  }
  function info_ver(elem) {
        event.preventDefault();
        

        name =document.getElementById('name'+elem.id).value;
        tel=document.getElementById('tel'+elem.id).value;
        email =document.getElementById('email'+elem.id).value;
        descricao=document.getElementById('descricao'+elem.id).value;
        sitio=document.getElementById('sitio'+elem.id).value;
        
        document.getElementById('name_ver').value= name;
        document.getElementById('tel_ver').value=tel;
        document.getElementById('email_ver').value=email;  
        document.getElementById('descricao_ver').value=descricao;
        document.getElementById('localizacao_ver').value=sitio;
       
  }             
     

</script>
@stop
