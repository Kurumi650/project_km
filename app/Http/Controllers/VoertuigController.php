<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\User;
use App\Models\Voertuig;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;


class VoertuigController extends Controller
{

    public function index(){
        $voertuigen = DB::table('voertuigen')
                        ->whereNull('deleted_at')
                        ->get();
    
        return view('index', ['voertuigen' => $voertuigen]);
    }    

    public function rit_overzicht(Request $request){
        $rit_overzichten = Rit::all();
        
        return view('rit_overzicht', ['rit_overzichten' =>$rit_overzichten]);
    }

    public function voertuig_toevogen() {
        
        return view('voertuig_toevogen');
    }

    public function info() {

        return view('info');
    }

    public function voertuig_opslaan(Request $request){
        $request->validate([
            'kenteken' => 'required',
            'merk' => 'required',
            'model' => 'required',
            'bouwjaar' => 'required|numeric',
            'hudig_km' => 'required|numeric|gt:0', 
        ], [
            'kenteken.required' => 'Het kenteken is verplicht.',
            'merk.required' => 'Het merk is verplicht.',
            'model.required' => 'Het model is verplicht.',
            'bouwjaar.required' => 'Het bouwjaar is verplicht.',
            'bouwjaar.numeric' => 'Het bouwjaar moet een getal zijn.',
            'hudig_km.required' => 'De huidige kilometerstand is verplicht.',
            'hudig_km.numeric' => 'De huidige kilometerstand moet een getal zijn.',
            'hudig_km.gt' => 'De huidige kilometerstand moet een positief getal zijn.', 
        ]);
    
        DB::table('voertuigen')->insert([
            'kenteken' => $request->kenteken,
            'merk' => $request->merk,
            'model' => $request->model,
            'bouwjaar' => $request->bouwjaar,
            'hudig_km' => $request->hudig_km,
        ]);
    
        return redirect('/')->with('voertuig_opgeslaagd', 'Het voertuig is succesvol opgeslagen!');
    }

    public function rit_toevogen() {
        $voertuigen = DB::table('voertuigen')->get();
        return view('rit_toevogen', ['voertuigen' => $voertuigen]);
    }

    public function rit_opslaan(Request $request) {
        // Valideer de invoer met aangepaste foutmeldingen
        $request->validate([
            'datum' => 'required|date',
            'tijd_van' => 'required|date_format:H:i',
            'tijd_tot' => 'required|date_format:H:i',
            'locatie_van' => 'required|string',
            'locatie_tot' => 'required|string',
            'afstand' => 'required|numeric|gt:1', // Afstand moet een positief getal zijn
            'voertuig_id' => 'required|numeric',
        ], [
            'datum.required' => 'De datum is verplicht.',
            'datum.date' => 'De opgegeven datum is niet geldig.',
            'tijd_van.required' => 'De starttijd is verplicht.',
            'tijd_van.date_format' => 'De starttijd moet in het formaat H:i zijn.',
            'tijd_tot.required' => 'De eindtijd is verplicht.',
            'tijd_tot.date_format' => 'De eindtijd moet in het formaat H:i zijn.',
            'locatie_van.required' => 'De startlocatie is verplicht.',
            'locatie_tot.required' => 'De eindlocatie is verplicht.',
            'afstand.required' => 'De afstand is verplicht.',
            'afstand.gt' => 'De afstand moet een positief getal zijn.',
            'afstand.numeric' => 'De afstand moet een getal zijn.',
            'voertuig_id.required' => 'Het voertuig is verplicht.',
        ]);
    
        // Haal het voertuig op
        $voertuig = DB::table('voertuigen')->where('id', $request->voertuig_id)->first();
    
        if (!$voertuig) {
            return redirect()->back()->withErrors(['voertuig_id' => 'Het opgegeven voertuig-ID bestaat niet.']);
        }
    
        // Bereken de nieuwe kilometerstand
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
    
        // Update de kilometerstand van het voertuig
        DB::table('voertuigen')->where('id', $request->voertuig_id)->update([
            'hudig_km' => $nieuwe_kilometerstand,
        ]);
    
        // Redirect naar de homepage met een succesbericht
        return redirect('/')->with('rit_opgeslaagd', 'De rit is succesvol opgeslagen!');
    }
    
    public function edit_voertuig(string $id)
    {
        $voertuig = DB::table('voertuigen')
            ->where('id', $id)
            ->first();
    
        if (!$voertuig) {
            return redirect()->back()->with('error', 'Voertuig niet gevonden.');
        }
            return view('edit_voertuig', [
            'voertuig' => $voertuig
        ]);
    }
    
    public function update(Request $request, string $id)
    {
        $voertuig_km = DB::table('voertuigen')->where('id', $id)->first();
        
        // Validate the other request data
        $request->validate([
            'kenteken' => 'required|string',
            'merk' => 'required|string',
            'model' => 'required|string',
            'bouwjaar' => 'required|numeric',
        ]);
    
        DB::table('voertuigen')->where('id', $id)->update([
            'kenteken' => $request->kenteken,
            'merk' => $request->merk,
            'model' => $request->model,
            'bouwjaar' => $request->bouwjaar,
            'hudig_km' => $voertuig_km->hudig_km,
        ]);
            return redirect('/')->with('voertuig_bewerkt', 'Voertuig succesvol bijgewerkt!');
    }    
    
    public function delete($id)
    {
        $voertuig = Voertuig::findOrFail($id);
        $voertuig->delete(); 

        return redirect()->back()->with('success', 'Voertuig succesvol verwijderd!');
    }
}