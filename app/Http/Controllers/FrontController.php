<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class FrontController extends Controller
{
    public function getLevadas(){
       	$levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $foto=DB::table('fotos')
              ->select('fotos.*')
              ->get();
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        
        return view('levadas',['levada'=>$levada , 'foto'=>$foto, 'sobre'=>$sobres]);
    }

    public function getExcursões_info($id){
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        $levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $excursoes=DB::table('excursaos')
              ->select('excursaos.*')
              ->get();
        $excu_levada=DB::table('levada_excursoes')
              ->select('levada_excursoes.*')
              ->get();
        $foto=DB::table('fotos')
              ->select('fotos.*')
              ->get();
        
        return view('excursoes_info',['levada'=>$levada , 'excursoe'=>$excursoes ,'excu_levada'=> $excu_levada ,'foto'=>  $foto, 'sobre'=>$sobres,'id'=>$id]);
    }

    public function getLevada_info($id){
        $levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $foto=DB::table('fotos')
              ->select('fotos.*')
              ->get();
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        
        return view('levada_info',['levada'=>$levada , 'foto'=>$foto, 'sobre'=>$sobres,'id'=>$id]);
    }
   
    public function getTransfer(){
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        
        return view('transfers',['sobre'=>$sobres]);
    }

    public function getReserva(){
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        $excursoes=DB::table('excursaos')
              ->select('excursaos.*')
              ->get();
        
        return view('reservas',['sobre'=>$sobres, 'excursoe'=>$excursoes]);
    }

     public function getExcursao(){
        $sobres=DB::table('sobres')
              ->select('sobres.*')
              ->get();
        $levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $excursoes=DB::table('excursaos')
              ->select('excursaos.*')
              ->get();
        $excu_levada=DB::table('levada_excursoes')
              ->select('levada_excursoes.*')
              ->get();
        $foto=DB::table('fotos')
              ->select('fotos.*')
              ->get();
        
        
        return view('excursoes',['levada'=>$levada , 'excursoe'=>$excursoes ,'excu_levada'=> $excu_levada ,'foto'=>  $foto, 'sobre'=>$sobres]);
    }

    public function postReserva_inser(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:reservas',
            'email'=> 'required|unique:reservas',
            'n_a' => 'required',
            'n_b' => 'required',
            'excursoes' => 'required'
        ]);
       
        
        $name = $request["name"];
        $n_a = $request["n_a"];
        $n_b = $request["n_b"];
        $excursao = $request["excursoes"];
        $email=$request["email"];
        $today=date("Y-m-d h:i:s");
        $nab=$n_a+$n_b;
        $preco=($n_a*15)+($n_b*7.5);
      

        DB::table('reservas')->insert([
            ['name'=>$name,
            'email'=>$email,
            'n_pessoas'=>$nab,
            'id_excursao'=>$excursao,
            'password'=>round(microtime(true)),
            'preco'=>$preco,
            'created_at'=>$today
            ]
        ]);

        /*$to = $email;
        $subject = "Não Responda";
        $txt = "O seu pedido para a Excursão foi enviado;\n A sua password é: ".round(microtime(true))."Em caso de duvida sobre  Excursão por favor contacte-nos";
        $headers = "From: $email_l" . "\r\n";
        
        mail($to,$subject,$txt,$headers);*/
    
        

        return redirect()->route('reserva')->with(['message'=>' Porfavor verifique no seu email para receber a sua password !']);
     }

    public function postTransfer_inser(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:transfers',
            'email'=> 'required|unique:transfers',
            'n_pessoas' => 'required|',
            'transfer' => 'required',
            'date' => 'required',
            'hora_t' => 'required|',
            'loc'=>'required'
        ]);
       
        
        $name = $request["name"];
        $n_pessoas = $request["n_pessoas"];
        $transfer = $request["transfer"];
        $date = $request["date"];
        $email=$request["email"];
        $hora_t = $request["hora_t"];
        $location=$request["loc"];
        $today=date("Y-m-d h:i:s");
       
      

        DB::table('transfers')->insert([
            ['name'=>$name,
            'email'=>$email,
            'n_pessoas'=>$n_pessoas,
            'transfers'=>$transfer,
            'dia'=>$date,
            'location'=>$location,
            'password'=>round(microtime(true)),
            'hora'=>$hora_t,
            'created_at'=>$today
            ]
        ]);

        /*$to = $email;
        $subject = "Não Responda";
        $txt = "O seu pedido de Transfer foi enviado;\n A sua password é: ".round(microtime(true))."Em caso de duvida sobre transfer por favor contacte-nos";
        $headers = "From: $email" . "\r\n";
        
        mail($to,$subject,$txt,$headers);*/
    
        

        return redirect()->route('transfer')->with(['message'=>' Porfavor verifique no seu email para receber a sua password !']);
     }

    public function postEmail(Request $request){
        $this->validate($request,[
            'Name' => 'required|',
            'Email' => 'required|',
            'Message' => 'required'
        ]);


        $name = $request["Name"];
        $email = $request["Email"];
        $message = $request["Message"];

        $to = " $email";
  			$subject = "$name";
  			$txt = "Funcinou ";
  			$headers = "From: pedrolobowork@gmail.com" . "\r\n";
  			
  			mail($to,$subject,$txt,$headers);

        $to = " pedrolobowork@gmail.com";
        $subject = "Reserva";
        $txt = "$message";
        $headers = "From: $email" . "\r\n";
        
        mail($to,$subject,$txt,$headers);
		
        
        
         

        return redirect()->route('levadas');
     }

     public function getEmail(){
       	$levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        $foto=DB::table('fotos')
              ->select('fotos.*')
              ->get();
        
        return view('levadas',['levada'=>$levada],['foto'=>$foto]);
    }
}
