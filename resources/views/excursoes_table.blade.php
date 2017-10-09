@extends('layouts.app')
@section('content')
@include('includes.message-block')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class='box-title'></i><b> Excursões</b></h4>
      </div>
      <div class="panel-body">
        <div class='row-fluid'>
          <div id="postBody"></div>

              <table id="example" class=' table-bordered table-striped' class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>ID Excursões</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                 
                  <th>Levadas</th>
                  <th>Dia</th>
                  <th>Hora de Partida</th>
                  <th>Hora de Chegada</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <form>
                  @foreach($excursoe as $excursoes)
                   <tr>
                      <td>{{ $excursoes->id}}</td>
                      <td>{{ $excursoes->name}}</td>
                      <td><?php echo substr( $excursoes->descricao,0,10); ?></td>
                     

                      <td>
                      
                        <?php $var1=0;?>
                         @foreach($excu_levada as $excu_levadas)
                         
                            @if($excursoes->id == $excu_levadas->id_excursoe)
                                @foreach($levada as $levadas)
                                
                                    @if( $levadas->id == $excu_levadas->id_levada)
                                      {{$levadas->name}}<br>
                                      <?php $var1++;
                                      $var="levada".$var1.$excursoes->id;
                                      ?>

                                       <input  id="{{$var}}" value="{{$levadas->name}}"  name="{{$levadas->id}}" style="display: none" >
                                    @endif
                                @endforeach
                            @endif
                          @endforeach
                      </td>

                      <td>{{ $excursoes->dia}} </td>
                      <td>{{ $excursoes->hora_saida}}</td>
                      <td>{{ $excursoes->hora_regresso}}</td>
                      <td>
                       <!-- /.btn ver -->
                      <a href='#' type='button' class='btn btn-info btn-xs' onclick="excursao_ver(this)" id="{{ $excursoes->id}}" data-toggle="modal" data-target="#ModalVer"><span><i class='fa fa-eye' aria-hidden='true'></i></span></a>
                      <!-- /.btn ver -->
                      <!-- /.btn editar -->
                      <a href='#' type='button' class='btn btn-warning btn-xs'onclick="edit_excursao(this)" id="{{ $excursoes->id}}" ><span><i class='fa fa-pencil' aria-hidden='true'></i></span></a>
                      <!-- /.btn editar -->
                      <!-- /.btn apagar -->
                      <a href="#" type='button'  class='btn btn-danger btn-xs' onclick="excursao_apagar(this)"  name="{{ $excursoes->id}}"  ><span><i class='fa fa-trash' aria-hidden='true'></i></span></a>
                       <!-- /.btn apagar -->
                      </td>

                   </tr>

                   <input  id="name{{ $excursoes->id}}" value="{{ $excursoes->name}}"  style="display: none">
                   <input  id="preco{{ $excursoes->id}}" value="{{ $excursoes->preco}}"  style="display: none">
                   <input  id="dia{{ $excursoes->id}}" value="{{ $excursoes->dia}}"  style="display: none">
                   <input  id="hora_sa{{ $excursoes->id}}" value="{{ $excursoes->hora_saida}}"  style="display: none">
                   <input  id="hora_ch{{ $excursoes->id}}" value="{{ $excursoes->hora_regresso}}"  style="display: none">
                   <input  id="descricao{{ $excursoes->id}}" value="{{ $excursoes->descricao}}"  style="display: none">
                 @endforeach
               </form>
               </tbody>
            </table>
          </div>
          <div class=''>
            <a href='#' data-toggle="modal" data-target="#myModal"  class='btn btn-success date_doc'>
              <i class='fa fa-plus'></i> Novo  Excursão
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
<div id="Apagar_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{route('excursao_del')}}" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apagar Excursão</h4>
        </div>
        <div class="modal-body">
          <h4>Tem a certesa que quer apagar este Excursão???</h4>
          <ul>
            <li>
              Todos os documentos que fazem parte deste Excursão irão ser apagado.
            </li>
          </ul>
          <input  id="apagar_excursao" name="id"  style="display: none">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Apagar</button>
        </div>
    </form>
    </div><!-- /.modal-content -->

  </div>
</div>

<!-- Modal Para Inserir-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b> Inserir  Excursão</b></h4>
      </div>
      <form class="form-group" id="excursao_form" action="{{route('excursao_inser')}}" enctype="multipart/form-data" method="post">
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Excursão: </label><br>
                <input type='text' class='form-control'  required='required' name='name' id='name'  placeholder='Nome da Levada: ' >
                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Excursão: </label><br>
                 <textarea class="form-control" required='required' name='descricao'  rows="5" id="comment"  placeholder="Descrição da Levada..."></textarea>
              </div>
            </div>
              <div class="form-group">
                  <div class='form-group has-feedback'>
                   <label>Levadas da Excursão: </label><br>
                    <select id="le_ex" name="levadas[]" multiple class="form-control" required="required">
                      @foreach($levada as $levadas)
                          <option value="{{ $levadas->id}}" >{{ $levadas->name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
            
           
             
                <input  type="number" min="1" step="any"  class='form-control' style="display: none"  value="15" name='preco' id='preco' placeholder='Preço da Levada: ' >
              
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dia da Excursão: </label><br>
                <input  type="date"   class='form-control'  required='required' name='date' id='date' placeholder='Preço da Levada: ' >
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora de Partida: </label><br>
                <div class="input-group clockpicker">
                    <input type="text" class="form-control"  name='hora_p' id='hora_p'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora de Chegada: </label><br>
                <div class="input-group clockpicker">
                    <input type="text" class="form-control"  name='hora_c' id='hora_c'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" id="_user" value="" >
          <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
          <a type="button" class="btn btn-primary" id="btn_type_inser" onclick="excursao_inser_submit(this)" ><i class="fa fa-check" aria-hidden="true"></i> Confirmar</a>
          <button type="button" class="btn btn-warning" data-dismiss="modal" ><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Para Editar-->
<div class="modal fade" tabindex="-1" id="ModalEdit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b>Editar Excursão</b></h4>
      </div>
      <form class="form-group"  action="{{route('excursao_edi')}}" method="post" novalidate>
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>

                <label>Nome da Excursão: </label><br>
                <input type='text' class='form-control'  required='required' name='name_edi' id='name_edi' placeholder='Nome da Excursão: ' >

                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Excursão: </label><br>
                 <textarea class="form-control" required='required' name='descricaoedi' id='descricao_edi' rows="5" id="comment"  placeholder="Descrição da Levada..."></textarea>
              </div>
            </div>

              <div class="form-group">
                  <div class='form-group has-feedback'>
                   <label>Levadas da Excursão: </label><br>
                   <p class="bg-info">Se não alterar as levadas as levadas não irão ser alteradas</p>
                    <select id="le_ex2" name="levadas_edit[]" multiple class="form-control" required="required">
                      @foreach($levada as $levadas)
                          <option value="{{ $levadas->id}}" >{{ $levadas->name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
            
            
                <input  type="number" min="1" step="any" value="15" style="display: none" class='form-control'  required='required' name='preco_edi' id='preco_edi' placeholder='Preço da Levada: ' >
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dia da Excursão: </label><br>
                <input  type="date"   class='form-control'  required='required' name='dia_edi' id='dia_edi' placeholder='Preço da Levada: ' >
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora de Partida: </label><br>
                <div class="input-group clockpicker">
                    <input type="text" class="form-control"  name='hora_p_edi' id='hora_s_edi'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora de Chegada: </label><br>
                <div class="input-group clockpicker">
                    <input type="text" class="form-control"  name='hora_c_edi' id='hora_c_edi'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
              </div>
            </div>
        
            
        </div>
        <div class="modal-footer">
          <input type="text" id="id_excursao" name="id_edi" style="display: none" >
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
        <h4 class="modal-title"><i class='fa fa-arrow-circle-o-right'></i><b> Ver Excursão</b></h4>
      </div>
        <div class="modal-body">
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Nome da Excursão: </label><br>
                <input type='text' class='form-control'    id='name_ver' placeholder='Nome da Levada: ' disabled>

                </div>
            </div>
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Descrição da Excursão: </label><br>
                 <textarea class="form-control" required='required' name='descricaover' id='descricao_ver' rows="5" id="comment"  placeholder="Descrição da Levada..." disabled></textarea>
              </div>
            </div>
              <div class="form-group">
                  <div class='form-group has-feedback'>
                   <label>Levadas da Excursão: </label><br>
                    
                   <input type='text' class='form-control'    id='levada_ver' placeholder='Nome da Levada: ' disabled>
                </div>
              </div>
            
            <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Preço da Excursão: </label><br>
                <input  type="number" min="1" step="any"  class='form-control'  required='required'  id='preco_ver' placeholder='Preço da Levada: ' disabled>
              </div>
            </div>
        
         <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Dia da Excursão: </label><br>
                <input  type="date"   class='form-control'  required='required' name='dia_edi' id='dia_ver' placeholder='Preço da Levada: ' disabled>
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora de Partida: </label><br>
                <div class="input-group clockpicker">
                    <input type="text" class="form-control" value="18:00" name='hora_p_edi' id='hora_s_ver' disabled>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class='form-group has-feedback'>
                <label>Hora de Chegada: </label><br>
                <div class="input-group clockpicker">
                    <input type="text" class="form-control" value="18:00" name='hora_c_edi' id='hora_c_ver' disabled>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
              </div>
            </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
  



<script  type="text/javascript">
  var token = '{{Session::token()}}';
  var id;
  var name;
  var descricao;
  var duracao;
  var dificuldade;
  var preco;
  var foto;
  var dia;
  var hora_c;
  var hora_s;

 function excursao_ver(elem) {
        id=elem.id;
        var str="";
        var var2=0;
        var var3=0;
        var var4=0;
        var element = null;;
        var a =null;
        while(var2==0){
            var3++;
             a = "levada"+var3+id;
             
             
            if (document.getElementById(a) !=null){
              element =  document.getElementById(a).value;
              console.log("-"+a);
              var4=""+element+"  ";
              str = ""+str+var4;
              console.log("-"+str);
            }else {
               var2=1; 
            }
          }
        name =document.getElementById('name'+elem.id).value;
        preco=document.getElementById('preco'+elem.id).value;
        dia =document.getElementById('dia'+elem.id).value;
        hora_c=document.getElementById('hora_ch'+elem.id).value;
        hora_s=document.getElementById('hora_sa'+elem.id).value;
        descricao=document.getElementById('descricao'+elem.id).value;
        
        document.getElementById('levada_ver').value= str;
        document.getElementById('name_ver').value= name;
        document.getElementById('preco_ver').value=preco;
        document.getElementById('dia_ver').value=dia;
        document.getElementById('hora_s_ver').value=hora_s;
        document.getElementById('hora_c_ver').value=hora_c;
        document.getElementById('descricao_ver').value=descricao;  
         //document.getElementById('levada').value= duracao;
        }
  function excursao_apagar(vari) {
       event.preventDefault();
       $("#Apagar_modal").modal();
       console.log("-"+vari.name);
       //document.getElementById('apagar_excursao').value=vari.name;
       var var1;
       //var1=document.getElementById('apagar_excursao').value;
        //console.log("-"+var1);
  }


  function edit_excursao(elem) {
        event.preventDefault();
        $("#ModalEdit").modal();
        
        var str=[];
        var var2=0;
        var var3=0;
        var var4=0;
        var element = null;;
        var a =null;

        name =document.getElementById('name'+elem.id).value;
        preco=document.getElementById('preco'+elem.id).value;
        dia =document.getElementById('dia'+elem.id).value;
        descricao=document.getElementById('descricao'+elem.id).value;
        hora_c=document.getElementById('hora_ch'+elem.id).value;
        hora_s=document.getElementById('hora_sa'+elem.id).value;
        //preco=document.getElementById('preco'+elem.id).value;
       
        document.getElementById('name_edi').value= name;
        document.getElementById('preco_edi').value=preco;
        document.getElementById('id_excursao').value=elem.id;  
        document.getElementById('dia_edi').value=dia;
        document.getElementById('hora_s_edi').value=hora_s;
        document.getElementById('hora_c_edi').value=hora_c;  
        document.getElementById('descricao_edi').value=descricao;
  }             


  function excursao_apagar(vari) {
       event.preventDefault();
       $("#Apagar_modal").modal();
       console.log("-"+vari.name);
       document.getElementById('apagar_excursao').value=vari.name;
       var var1;
       //var1=document.getElementById('apagar_excursao').value;
        //console.log("-"+var1);
   }

    function excursao_inser_submit(elem) {
      name=document.getElementById('name').value;
      preco=document.getElementById('preco').value;
      //preco=document.getElementById('preco_inser').value;
      console.log("Pedro"+name);
      name=name.replace(/\s/g,'');
      preco=preco.replace(/\s/g,'');
      
      if(name==""){
       // console.log("Falhou");
      }else{
        document.getElementById("excursao_form").submit();
        //console.log("Flag1");
        document.getElementById("btn_type_inser").style.display = 'none';
      }
     }

</script>
@stop
