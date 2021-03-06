<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstroCargo as Cargos;

class MstroCargosController extends Controller
{
    private $Page_Title;


    public function __construct(){
      //$this->middleware('auth');
      $this->Page_Title = 'Cargos';
    }

    public function index() {

        $Cargos =  Cargos::orderBy('nom_cargo')->where('id_cargo','>','0')->paginate(10);
         return [
            'pagination' => [
                'total'        => $Cargos->total(),
                'current_page' => $Cargos->currentPage(),
                'per_page'     => $Cargos->perPage(),
                'last_page'    => $Cargos->lastPage(),
                'from'         => $Cargos->firstItem(),
                'to'           => $Cargos->lastItem(),
            ],
            'Registros' => $Cargos
        ];

    }


    public function showForm(){
        $Page_Title = $this->Page_Title;
        return view('generales.cargos', compact('Page_Title'));
    }


    public function store(Request $FormData) {
        $this->validate( $FormData , ['nom_cargo'=>'required']);
        $Cargo           = new Cargos;
        $Cargo->nom_cargo  = $FormData->nom_cargo;
        $Cargo->inactivo = 0;
        $Cargo->save();
    }

    public function show()  {
        return view('generales.cargos');
    }

    public function update(Request $FormData)   {
        $this->validate( $FormData , ['nom_cargo'=>'required']);
        $Cargo           = Cargos::findOrFail($FormData->id_cargo );
        $Cargo->nom_cargo  = $FormData->nom_cargo;
        $Cargo->inactivo = $FormData->inactivo;
        $Cargo->update();
    }


    public function destroy($id) {
        $Cargo = Cargos::findOrFail($id );
        $Cargo->delete();
    }
}
