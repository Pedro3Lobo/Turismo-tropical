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
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <form>
                  @foreach($levada as $levadas)
                   <tr>
                      <td>{{ $levadas->id}}</td>
                      <td>{{ $levadas->name}}</td>
                      <td><?php echo substr( $levadas->descricao,0,50); ?>...</td>
                      <td>{{ $levadas->duracao}}</td>
                      <td>{{ $levadas->dificuldade}}</td>
                      <td>
                      <a href='#' type='button'class='btn btn-info btn-xs' onclick="levadas_ver(this)" id="{{ $levadas->id}}" data-toggle="modal" data-target="#ModalVer"><span><i class='fa fa-eye' aria-hidden='true'></i></span></a>
                      <a href='#' type='button'class='btn btn-warning btn-xs'onclick="edit_levadas(this)" name="{{$levadas->id}}" ><span><i class='fa fa-pencil' aria-hidden='true'></i></span></a>
                      <a href="#" type='button'class='btn btn-danger btn-xs' onclick="levadas_apagar(this)" name="{{ $levadas->id}}"><span><i class='fa fa-trash' aria-hidden='true'></i></span></a></td>
                   </tr>
                   <input  id="type_docs{{ $levadas->id}}" value="{{$levadas->id}}"  style="display: none">
                   <input  id="name{{ $levadas->id}}" value="{{$levadas->name}}"  style="display: none">
                   <input  id="descricao{{ $levadas->id}}" value="{{$levadas->descricao}}"  style="display: none">
                   <input  id="duracao{{ $levadas->id}}" value="{{$levadas->duracao}}"  style="display: none">
                   <input  id="dificuldade{{ $levadas->id}}" value="{{$levadas->dificuldade}}"  style="display: none">
                   @foreach($foto as $fotos)
                      @if( $fotos->id_levada == $levadas->id)
                        <input  id="foto{{ $levadas->id}}" value="{{$fotos->name}}"  style="display: none">
                      @endif
                    @endforeach
                   
                   <input  id="type_docs{{ $levadas->id}}" value="{{$levadas->id}}"  style="display: none">
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

<div class="modal fade" id="Apagar_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('levada_del')}}" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apagar Levada</h4>
        </div>
        <div class="modal-body">
          <h4>Tem a certesa que quer apagar este Levada???</h4>
          <ul>
            <li>
              Todos os documentos que fazem parte deste Levadas irão ser apagado.
            </li>
          </ul>
          <input  id="apagar_levada" name="id"  style="display: none">
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
<!-- Modal Para Inserir-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b> Inserir Levada</b></h4>
      </div>
      <form class="form-group" id="levadas_inser" action="{{route('levada_inser')}}" enctype="multipart/form-data" method="post">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Levada: </label><br>
                <input type='text' class='form-control'  required='required' name='name' id='name' placeholder='Nome da Levada: ' >
                
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
                <label>Escolha a imagem para fazer Upload:</label>
                <input type="file" name="file" required='required'  id="file">
             </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" id="_user" value="" >
          <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
          <a type="button" class="btn btn-primary" id="btn_type_inser" onclick="levadas_inser_submit(this)" ><i class="fa fa-check" aria-hidden="true"></i> Confirmar</a>
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
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b>Editar Levadas</b></h4>
      </div>
      <form class="form-group" id="levadas_edi" action="{{route('levada_edi')}}" method="post">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Levada: </label><br>
                <input type='text' class='form-control'  required='required' name='name_edi' id='name_edi' placeholder='Nome da Levada: ' >
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Levada: </label><br>
                 <textarea class="form-control" required='required' name='descricao_edi' id='descricao_edi' rows="5" id="comment"  placeholder="Descrição da Levada..."></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Duração da Levada: </label><br>
                <input type='time' class='form-control'  required='required' name='duracao_edi' id='duracao_edi' placeholder='Duração da Levada:' required='required'>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dificuldade da Levada: </label><br>
                <input  type="radio" name="dificuldade_edi" id="dificuldade_f" value="Facil" checked> Facil
                <input  type="radio" name="dificuldade_edi" id="dificuldade_m" value="Médio"> Médio
                <input  type="radio" name="dificuldade_edi" id="dificuldade_d" value="Difícil">Difícil
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Escolha a imagem para fazer Upload:</label>
                <input type="file" name="file_e"   id="file">
             </div>
            </div>
            
            
        </div>
        <div class="modal-footer">
          <input type="text" id="id_levadas" name="id_l" style="display: none" >
          <input type="text" name="_token"  value="{{ csrf_token() }}" style="display: none" >
          <button type="submit" id="btn_type_edit"  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Guardar Mudanças</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
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
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b> Ver Levada</b></h4>
      </div>
        <div class="modal-body">
            <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Levada: </label><br>
                <input type='text' class='form-control' id='name_ver' placeholder='Nome da Levada:' disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Levada: </label><br>
                 <textarea class="form-control"  id='descricao_ver' rows="5"   placeholder="Descrição da Levada..." disabled></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Duração da Levada: </label><br>
                <input type='time' class='form-control'    id='duracao_ver' placeholder='Duração da Levada:' disabled>
              </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dificuldade da Levada: </label><br>
                <input  type="radio" id="dificuldade_ver_f" value="Facil" disabled> Facil
                <input  type="radio" id="dificuldade_ver_m" value="Médio" disabled> Médio
                <input  type="radio" id="dificuldade_ver_d" value="Difícil" disabled>Difícil
              </div>
            </div>
        </div>
      
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->




<script  type="text/javascript">
  var token = '{{Session::token()}}';
  var id;
  var name;
  var descricao;
  var duracao;
  var dificuldade;
  var preco;
  var foto;

 function levadas_ver(elem) {
        id=elem.name;
        console.log("ola"+id)
        name =document.getElementById('name'+elem.id).value;
        descricao=document.getElementById('descricao'+elem.id).value;
        duracao =document.getElementById('duracao'+elem.id).value;
        dificuldade=document.getElementById('dificuldade'+elem.id).value;
        var foto=document.getElementById('foto'+elem.id).value;
        console.log('foto:'+foto);
         //document.getElementById('type_doc_edit').value=name;
         document.getElementById('name_ver').value= name;
         document.getElementById('descricao_ver').value= descricao;
         document.getElementById('duracao_ver').value= duracao;
         if(dificuldade=="Facil"){
            document.getElementById('dificuldade_ver_f').checked = true;
         }else if(dificuldade="Médio"){
            document.getElementById('dificuldade_ver_m').checked = true;
         }else if(dificuldade="Difícil"){
            document.getElementById('dificuldade_ver_d').checked = true;
         }
         
          
        }
  function levadas_apagar(vari) {
       event.preventDefault();
       $("#Apagar_modal").modal();
       document.getElementById('apagar_levada').value=vari.name;
  }


  function edit_levadas(elem) {
         event.preventDefault();
         $("#ModalEdit").modal();
         id=""+elem.name;
        console.log("ola"+id)
         name =document.getElementById('name'+elem.name).value;
         descricao=document.getElementById('descricao'+elem.name).value;
         duracao =document.getElementById('duracao'+elem.name).value;
         dificuldade=document.getElementById('dificuldade'+elem.name).value;
        
         
         //document.getElementById('type_doc_edit').value=name;
         document.getElementById('id_levadas').value=id;
         document.getElementById('name_edi').value= name;
         document.getElementById('descricao_edi').value= descricao;
         document.getElementById('duracao_edi').value= duracao;
         if(dificuldade=="Facil"){
            document.getElementById('dificuldade_f').checked = true;
         }else if(dificuldade="Médio"){
            document.getElementById('dificuldade_m').checked = true;
         }else if(dificuldade="Difícil"){
            document.getElementById('dificuldade_d').checked = true;
         }
        
        
        document.getElementById('id_levadas').value=elem.name;

   }

    function levadas_inser_submit(elem) {
      name=document.getElementById('name').value;
      descricao=document.getElementById('descricao_inser').value;
      //preco=document.getElementById('preco_inser').value;
      //console.log("Pedro"+name);
      name=name.replace(/\s/g,'');
      descricao=descricao.replace(/\s/g,'');
      
      if(name==""){
       // console.log("Falhou");
      }else{
        document.getElementById("levadas_inser").submit();
        //console.log("Flag1");
        document.getElementById("btn_type_inser").style.display = 'none';
      }
     }

</script>
@stop
