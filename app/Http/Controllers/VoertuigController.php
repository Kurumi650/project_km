<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;


class VoertuigController extends Controller
{

    public function index(){
        $voertuigen =DB::table('voertuigen')->get();

        return view('index', ['voertuigen' =>$voertuigen]);
    }


    public function voertuig_toevogen() {
        
        return view('voertuig_toevogen');
    }



    public function voertuig_opslaan(Request $request){
        $request->validate([
            'kenteken' => 'required',
            'merk' => 'required',
            'model' => 'required',
            'bouwjaar' => 'required|numeric',
            'hudig_km' =>'required|numeric',
        ]);
    
        DB::table('voertuigen')->insert([
            'kenteken' => $request->kenteken,
            'merk' => $request->merk,
            'model' => $request->model,
            'bouwjaar' => $request->bouwjaar,
            'hudig_km' => $request->hudig_km,
        ]);
    
        
        return redirect('/');
    }

    public function rit_toevogen() {
        $voertuigen = DB::table('voertuigen')->get();
        return view('rit_toevogen', ['voertuigen' => $voertuigen]);
    }


    
    public function rit_opslaan(Request $request) {
        $request->validate([
            'datum' => 'required|date',
            'tijd_van' => 'required|date_format:H:i',
            'tijd_tot' => 'required|date_format:H:i',
            'locatie_van' => 'required|string',
            'locatie_tot' => 'required|string',
            'afstand' => 'required|numeric',
            'voertuig_id' => 'required|numeric',
        ]);
    
        $voertuig = DB::table('voertuigen')->where('id', $request->voertuig_id)->first();
       
        $nieuwe_kilometerstand = $voertuig->hudig_km + $request->afstand;
    
        // Voeg een nieuwe rit toe
        DB::table('rit_overzicht')->insert([
            'datum' => $request->datum,
            'tijd_van' => $request->tijd_van,
            'tijd_tot' => $request->tijd_tot,
            'locatie_van' => $request->locatie_van,
            'locatie_tot' => $request->locatie_tot,
            'afstand' => $request->afstand,
            'voertuig_id' => $request->voertuig_id,
        ]);
    
        DB::table('voertuigen')->where('id', $request->voertuig_id)->update([
            'hudig_km' => $nieuwe_kilometerstand,
        ]);
    
        // Redirect naar de homepage met een succesbericht
        return redirect('/');
    }
    
    
    
    
}
