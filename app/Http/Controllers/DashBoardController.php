<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu as Menu;

use DB;
use Cache;
class DashBoardController extends Controller
{
    public function Index(){


      $Menu = Cache::tags('MenuOpciones')->rememberForever('Menu', function(){
            return DB::select(' call menus_listado() ');
      });

      //return  $Menu;
      return view('dashboard.index', compact('Menu'));

    }


}
