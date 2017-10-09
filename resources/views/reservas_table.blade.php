@extends('layouts.app')
@section('content')
@include('includes.message-block')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class='box-title'><i class='fa fa-book'></i><b> Reservas:</b></h4>
      </div>
      <div class="panel-body">
        <div class='row-fluid'>
          <div id="postBody"></div>
              <table id="example" class=' table-bordered table-striped' class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>ID Reserva</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Nº Pessoas </th>
                  <th>Excursões</th>
                  <th>Password</th>
                  <th>Preço</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <form>
                  @foreach($reserva as $reservas)
                   <tr>
                      <td>{{ $reservas->id}}</td>
                      <td>{{ $reservas->name}}</td>
                      <td>{{ $reservas->email}}</td>
                      <td>{{ $reservas->n_pessoas}}</td>
                      <td>
                        @foreach($excursoe as $excursoes)
                          @if($excursoes->id==$reservas->id_excursao)
                            {{$excursoes->name}}
                            <input  id="id_excursao{{ $reservas->id}}" value="{{$excursoes->name}}"  style="display: none">
                          @endif
                        @endforeach
                      </td>
                      
                      <td>{{ $reservas->password}}</td>
                      <td>{{ $reservas->preco}}€</td>
                      <td>
                      <a href='#' type='button'class='btn btn-info btn-xs' onclick="reservas_ver(this)" id="{{ $reservas->id}}" data-toggle="modal" data-target="#ModalVer"><span><i class='fa fa-eye' aria-hidden='true'></i></span></a>
                      <a href="#" type='button'class='btn btn-danger btn-xs' onclick="reservas_apagar(this)" name="{{ $reservas->id}}"><span><i class='fa fa-trash' aria-hidden='true'></i></span></a>
                      </td>
                   </tr>
                   
                   <input  id="name{{ $reservas->id}}" value="{{  $reservas->name}}"  style="display: none">
                   <input  id="preco{{ $reservas->id}}" value="{{  $reservas->preco}}"  style="display: none">
                   <input  id="n_pessoas{{ $reservas->id}}" value="{{ $reservas->n_pessoas}}"  style="display: none">
                  
                   <input  id="nif{{ $reservas->id}}" value="{{ $reservas->email}}"  style="display: none">
                   <input  id="password{{ $reservas->id}}" value="{{ $reservas->password}}"  style="display: none">
                  
                 @endforeach
               </form>
               </tbody>
            </table>
          </div>
          <div class=''>
          </div>
        </div
          <!-- /.box-body -->
      </div>
    </div>
  </div>
  <div class="col-md-2">
  </div><!-- /.box -->
</div>


</div>
<!-- Modal Para Editar-->

<div class="modal fade" tabindex="-1" id="ModalVer" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ver Reserva</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome do Reserva: </label><br>
                <input type='text' class='form-control'  required='required' name="nome_ver" id='nome_ver' placeholder='Reserva: ' required='required' disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Email: </label><br>
                <input type='email' class='form-control'   id='nif' placeholder='Reserva: ' required='required' disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nº de Pessoas: </label><br>
                <input type='text' class='form-control'   id='n_pessoas' placeholder='Reserva: ' required='required' disabled>
                
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Excursão: </label><br>
                <input type='text' class='form-control'   id='excursao' placeholder='Reserva: ' required='required' disabled>
                
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Password: </label><br>
                <input type='text' class='form-control'   id='password' placeholder='Reserva: ' required='required' disabled>
                
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Preço: </label><br>
                <input type='text' class='form-control'   id='preco' placeholder='Reserva: ' required='required' disabled>
                
              </div>
            </div>
            

      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="Apagar_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="reserva_del" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apagar Reserva</h4>
        </div>
        <div class="modal-body">
          <h4>Tem a certesa que quer apagar este Reserva???</h4>
          <ul>
            <li>
              Todos os documentos que fazem parte desta Reserva irão ser apagado.
            </li>
          </ul>
          <input  id="apagar_reserva" name="id"  style="display: none">
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
  var name;
  var numero;
  var excursao;
  var password;
  var nif;
  var preco;


 function reservas_ver(elem) {
        event.preventDefault();
        name =document.getElementById('name'+elem.id).value
        document.getElementById('nome_ver').value=name;
        numero =document.getElementById('n_pessoas'+elem.id).value
        document.getElementById('n_pessoas').value=numero;
        excursao =document.getElementById('id_excursao'+elem.id).value
        document.getElementById('excursao').value=excursao;
        password =document.getElementById('password'+elem.id).value
        document.getElementById('password').value=password;
        nif =document.getElementById('nif'+elem.id).value
        document.getElementById('nif').value=nif;
        preco =document.getElementById('preco'+elem.id).value
        preco=""+preco+"€";
        document.getElementById('preco').value=preco;
  }
  function reservas_apagar(vari) {
       event.preventDefault();
       $("#Apagar_modal").modal();
       document.getElementById('apagar_reserva').value=vari.name;
  }

</script>
@stop
