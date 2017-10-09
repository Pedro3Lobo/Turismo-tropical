@extends('layouts.app')
@section('content')
@include('includes.message-block')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class='box-title'><i class='fa fa-book'></i><b> Transfers:</b></h4>
      </div>
      <div class="panel-body">
        <div class='row-fluid'>
          <div id="postBody"></div>
              <table id="example" class=' table-bordered table-striped' class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>ID </th>
                  <th>Nome</th>
                  <th>Nº Pessoas </th>
                  <th>Excursões</th>
                  <th>Localização do Cliente</th>
                  <th>Data/Hora</th>
                  
                  <th>Pass</th>
                  <th>Preço</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <form>

                  @foreach($transfer as $trans)
                   <tr>
                      <td>{{ $trans->id}}</td>
                      <td>{{ $trans->name}}</td>
                      <td>{{ $trans->n_pessoas}}</td>
                      <td>
                        @if($trans->transfers=="t_30")
                          Carro (1-4 Pessoas)
                          <?php
                            $preco=30;
                            list($part1, $part2) = explode(':',$trans->hora);
                            $part0=$part1;?>
                            <input  id="transf{{ $trans->id}}" value="Carro (1-4 Pessoas)"  style="display: none">
                          @if((22<$part0)||($part0<8))
                            <?php
                             $preco=$preco+6;
                             ?>;
                          @endif

                          
                        @endif
                        @if($trans->transfers=="t_50")
                          Carro (1-8 Pessoas)
                          <?php
                            $preco=50;
                            list($part1, $part2) = explode(':',$trans->hora);
                            $part0=$part1;
                          ?>
                          <input  id="transf{{ $trans->id}}" value="Carro (1-8 Pessoas)"  style="display: none">
                          @if((22<$part0)||($part0<8))
                             <?php
                              $preco=$preco+10;
                             ?>
                          @endif
                        @endif
                      </td>
                      
                      <td>{{ $trans->location}}</td>
                      <td>{{ $trans->dia}}/{{$trans->hora}}</td>
                      <td>{{$trans->password}}</td>
                      <td>{{$preco}}€</td>
                      <td>

                      <a href='#' type='button'class='btn btn-info btn-xs' onclick="trans_ver(this)" id="{{ $trans->id}}" data-toggle="modal" data-target="#ModalVer"><span><i class='fa fa-eye' aria-hidden='true'></i></span></a>
                      <a href="#" type='button'class='btn btn-danger btn-xs' onclick="trans_apagar(this)" name="{{ $trans->id}}"><span><i class='fa fa-trash' aria-hidden='true'></i></span></a>
                      </td>
                   </tr>
                   
                   <input  id="name{{ $trans->id}}" value="{{$trans->name}}"  style="display: none">
                   <input  id="preco{{ $trans->id}}" value="{{$preco}}"  style="display: none">
                   <input  id="n_pessoas{{ $trans->id}}" value="{{ $trans->n_pessoas}}"  style="display: none">
                   <input  id="nif{{ $trans->id}}" value="{{ $trans->email}}"  style="display: none">
                   <input  id="dia{{ $trans->id}}" value="{{ $trans->dia}}"  style="display: none">
                   <input  id="hora{{ $trans->id}}" value="{{$trans->hora}}"  style="display: none">
                   <input  id="loc{{ $trans->id}}" value="{{$trans->location}}"  style="display: none">
                   <input  id="password{{ $trans->id}}" value="{{$trans->password}}"  style="display: none">
                  
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
        <h4 class="modal-title">Ver transfer</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome do transfer: </label><br>
                <input type='text' class='form-control'  required='required' name="nome_ver" id='nome_ver' placeholder='transfer: '  disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Email: </label><br>
                <input type='email' class='form-control'   id='nif' placeholder='transfer: '  disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nº de Pessoas: </label><br>
                <input type='text' class='form-control'   id='n_pessoas' placeholder='transfer: '  disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Localização: </label><br>
                <input type='text' class='form-control'   id='excursao' placeholder='transfer: '  disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Transfer: </label><br>
                <input type='text' class='form-control'   id='transf' placeholder='transfer: '  disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Password: </label><br>
                <input type='text' class='form-control'   id='password' placeholder='transfer: '  disabled>
                
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dia: </label><br>
                <input type='text' class='form-control'   id='dia' placeholder='transfer: '  disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora: </label><br>
                <input type='text' class='form-control'   id='hora' placeholder='transfer: '  disabled>
                
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Preço: </label><br>
                <input type='text' class='form-control'   id='preco' placeholder='transfer: '  disabled>
                
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
      <form action="transfer_del" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apagar Transfer</h4>
        </div>
        <div class="modal-body">
          <h4>Tem a certesa que quer apagar este transfer???</h4>
          <ul>
            <li>
              Todos os documentos que fazem parte desta transfer irão ser apagado.
            </li>
          </ul>
          <input  id="apagar_transfer" name="id"  style="display: none">
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
  var loc;
  var hora;
  var dia;
  var password;
  var nif;
  var preco;
  var transf;


 function trans_ver(elem) {
        event.preventDefault();
        name =document.getElementById('name'+elem.id).value
        document.getElementById('nome_ver').value=name;
        numero =document.getElementById('n_pessoas'+elem.id).value
        document.getElementById('n_pessoas').value=numero;
        loc =document.getElementById('loc'+elem.id).value
        document.getElementById('excursao').value=loc;
        password =document.getElementById('password'+elem.id).value
        document.getElementById('password').value=password;
        nif =document.getElementById('nif'+elem.id).value
        document.getElementById('nif').value=nif;
        dia =document.getElementById('dia'+elem.id).value
        document.getElementById('dia').value=dia;
        hora =document.getElementById('hora'+elem.id).value
        document.getElementById('hora').value=hora;
        transf =document.getElementById('transf'+elem.id).value
        document.getElementById('transf').value=transf;
        preco =document.getElementById('preco'+elem.id).value
        preco=""+preco+"€";
        document.getElementById('preco').value=preco;
  }
  function trans_apagar(vari) {
       event.preventDefault();
       $("#Apagar_modal").modal();
       document.getElementById('apagar_transfer').value=vari.name;
  }

</script>
@stop
