<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getLevadas(){
    
     return view('levadas');
    }

    public function getExcursoes(){
    
     return view('excursoes');
    }

    public function getLevadas_table(){
        $levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $foto=DB::table('fotos')
              ->select('fotos.*')
              ->get();
        
        return view('levadas_table',['levada'=>$levada],['foto'=>$foto]);
    }

    public function getReservas_table(){
        $reserva=DB::table('reservas')
              ->select('reservas.*')
              ->get();
        $excursoe=DB::table('excursaos')
              ->select('excursaos.*')
              ->get();
        
        return view('reservas_table',['reserva'=>$reserva , 'excursoe'=>$excursoe ]);
    }


    public function getTransfer_table(){
        $trans=DB::table('transfers')
              ->select('transfers.*')
              ->get();
        return view('transfers_table',['transfer'=>$trans]);
    }

    public function getExcursões_table(){
        $levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $excursoes=DB::table('excursaos')
              ->select('excursaos.*')
              ->get();
        $excu_levada=DB::table('levada_excursoes')
              ->select('levada_excursoes.*')
              ->get();
        
        return view('excursoes_table',['levada'=>$levada , 'excursoe'=>$excursoes ,'excu_levada'=> $excu_levada]);
    }

    public function getSobre_table(){
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        return view('sobre_table',['sobre'=>$sobres]);
    }

    public function postExcursao_inser(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:excursaos',
            'levadas' => 'required|',
            'preco' => 'required',
            'descricao' => 'required',
            'date' => 'required|',
            'hora_p' => 'required',
            'hora_c' => 'required'
        ]);
       
        
        $name = $request["name"];
        $levadas = Input::get("levadas");
        $preco = $request["preco"];
        $date =$request["date"];
        $descricao = $request["descricao"];
        $hora_p =$request["hora_p"];
        $hora_c =$request["hora_c"];
        $today=date("Y-m-d h:i:s");
       

        DB::table('excursaos')->insert([
            ['name'=>$name,
            'preco'=>$preco,
            'descricao'=>$descricao,
            'dia'=>$date,
            'hora_saida'=>$hora_p,
            'hora_regresso'=>$hora_c,
            'created_at'=>$today
            ]
        ]);
        $excursao = DB::table('excursaos')->orderBy('id', 'desc')->first();

       

        foreach ($levadas as $levada) {
            DB::table('levada_excursoes')->insert([
                ['id_excursoe'=>$excursao->id,
                'id_levada'=>$levada,
                'created_at'=>$today
                ]
            ]);
        }
         

        return redirect()->route('excursões_table')->with(['message'=>'A excursão foi inserida com sucesso!']);
     }

    public function postLevada_inser(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:levadas',
            'descricao_inser' => 'required|',
            'duracao_inser' => 'required',
            'dificuldade_inser' => 'required'
        ]);
       
        $id=1;
        $name = $request["name"];
        $descricao_inser = $request["descricao_inser"];
        $duracao_inser = $request["duracao_inser"];
        $dificuldade_inser = $request["dificuldade_inser"];

        $today=date("Y-m-d h:i:s");
        $file_="$id"."$name";
        $file_=str_replace(' ', '',  $file_);

        $var1="default.png";
        if(Input::hasFile('file')){
           
            $newfilename = round(microtime(true));
            $var1=$newfilename; 
            $file = Input::file('file');
            $extension =  $file->clientExtension();
            $var1="$var1.$extension";
            $file->move('img',$var1);
            $var1="img/$var1";
        }

        DB::table('levadas')->insert([
            ['name'=>$name,
            'descricao'=>$descricao_inser,
            'duracao'=>$duracao_inser,
            'dificuldade'=>$dificuldade_inser,
            'created_at'=>$today
            ]
        ]);
        $levada = DB::table('levadas')->orderBy('id', 'desc')->first();

         DB::table('fotos')->insert([
            ['name'=>$var1,
            'id_levada'=> $levada->id,
            'created_at'=>$today
            ]
        ]);

        return redirect()->route('levadas_table')->with(['message'=>'A levada foi Inserida com sucesso!']);
     }

      public function postReserva_del(Request $request){
        $this->validate($request,[
            'id' => 'required'
        ]);
        $id=$request["id"];
        DB::table('reservas')->where('id', '=',$id)->delete();
        return redirect()->route('reserva_table')->with(['message'=>'A Reserva foi Apagada com sucesso!']);
        
     }

     public function postLevada_del(Request $request){
        $this->validate($request,[
            'id' => 'required'
        ]);
        $id_l=$request["id"];
        DB::table('levadas')->where('id', '=',$id_l)->delete();
        DB::table('fotos')->where('id_levada', '=',$id_l)->delete();
        return redirect()->route('levadas_table')->with(['message'=>'O Levada foi Apagada com sucesso!']);
        
     }

     public function postExcursao_del(Request $request){
        $this->validate($request,[
            'id' => 'required'
        ]);
        $id_l=$request["id"];
        DB::table('excursaos')->where('id', '=',$id_l)->delete();
        DB::table('levada_excursoes')->where('id_excursoe', '=',$id_l)->delete();
        DB::table('reservas')->where('id_excursao', '=',$id_l)->delete();
        return redirect()->route('excursões_table')->with(['message'=>'A Excursão foi Apagada com sucesso!']);
        
     }
     public function postInfo(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'descricao' => 'required',
            'localizacao' => 'required',
            'tel' => 'required'
        ]);
        $id= $request["id"];
        $name = $request["name"];
        $email = $request["email"];
        $descricao = $request["descricao"];
        $localizacao = $request["localizacao"];
        $tel = $request["tel"];
        $today=date("Y-m-d h:i:s");

        DB::table('sobres')
        ->where('id',  1)
        ->update([
            'name'=>$name,
            'descricao'=>$descricao,
            'email'=>$email,
            'sitio'=>$localizacao,
            'tel'=>$tel,
            'updated_at'=>$today
       ]);
        return redirect()->route('sobre_table')->with(['message'=>'As informações da empresa foram atualizada com sucesso!']);
     }

     public function postLevada_edi(Request $request){
        $this->validate($request,[
            'id_l' => 'required',
            'name_edi' => 'required',
            'descricao_edi' => 'required',
            'duracao_edi' => 'required',
            'dificuldade_edi' => 'required'
        ]);
        $id= $request["id_l"];
        $name = $request["name_edi"];
        $descricao = $request["descricao_edi"];
        $duracao = $request["duracao_edi"];
        $dificuldade = $request["dificuldade_edi"];
        $today=date("Y-m-d h:i:s");
        $fotos = DB::table('fotos')->where('id_levada', "$id")->orderBy('id', 'desc')->first();
        $var1=$fotos->name;

        if(Input::hasFile('file')){
           $newfilename = round(microtime(true));
            $var1=$newfilename; 
            $file = Input::file('file');
            $extension =  $file->clientExtension();
            $var1="$var1.$extension";
            $file->move('img',$var1);
            $var1="img/$var1";
        }

        DB::table('levadas')
        ->where('id',  $id)
        ->update([
            'name'=>$name,
            'descricao'=>$descricao,
            'duracao'=>$duracao,
            'dificuldade'=>$dificuldade,
            'updated_at'=>$today
       ]);

        DB::table('fotos')
        ->where('id',$fotos->id)
        ->update([
            'name'=>$var1,
            'id_levada'=> $id
       ]); 
        return redirect()->route('levadas_table')->with(['message'=>'A levada '.$name.' foi atualizada com sucesso!']);
     }
public function postExcursao_edi(Request $request){
        $this->validate($request,[
            'id_edi' => 'required|',
            'name_edi' => 'required|',
            'descricaoedi' => 'required',
            'preco_edi' => 'required',
            'dia_edi' => 'required|',
            'hora_p_edi' => 'required|',
            'hora_c_edi' => 'required'
        ]);
       
        $id = $request["id_edi"];
        $name = $request["name_edi"];
        $preco = $request["preco_edi"];
        $descricao = $request["descricaoedi"];
        $date =$request["dia_edi"];
        $hora_p =$request["hora_p_edi"];
        $hora_c =$request["hora_c_edi"];

        $today=date("Y-m-d h:i:s");
        if(Input::get("levadas")==null){
            $levadas = Input::get("levadas");
            DB::table('excursaos')
            ->where('id',  $id)
            ->update([
                'name'=>$name,
                'preco'=>$preco,
                'descricao'=>$descricao,
                'dia'=>$date,
                'hora_saida'=>$hora_p,
                'hora_regresso'=>$hora_c,
                'updated_at'=>$today
            ]);
        }else{
            $levadas = Input::get("levadas");
            DB::table('excursaos')
            ->where('id',  $id)
            ->update([
                'name'=>$name,
                'preco'=>$preco,
                'descricao'=>$descricao,
                'dia'=>$date,
                'hora_saida'=>$hora_p,
                'hora_regresso'=>$hora_c,
                'updated_at'=>$today
            ]);
            foreach ($levadas as $levada) {
                DB::table('levada_excursoes')
                ->where('id',$fotos->id)
                ->update([
                    'id_excursoe'=>$id,
                    'id_levada'=> $levada->id,
                    'updated_at'=>$today
                ]); 
            }
        }
        return redirect()->route('excursões_table')->with(['message'=>'A excursão '.$name.' foi atualizada com sucesso!']);
     }
}
