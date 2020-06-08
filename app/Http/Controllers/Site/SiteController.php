<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function  __construct()
    {
       /* $this->middleware('auth');

        $this->middleware('auth')
            ->only([
                'contato',
                'categoria'
            ]);

        $this->middleware('auth')
            ->except([
                'index',
                'contato'

            ]);*/

    }


    public function index(){


        $title = 'Fitnnes';
        $var1= '123';
        $arrayData= [];
        return view('site.home.index',compact('title','var1','arrayData'));
    }

    public function contato(){
        return view('site.contato.index');
    }

    public function categoria($idCat){
        return "Listagem dos posts da categoria: {$idCat}";
    }

    public function categoriaOp($idCat=1){
        return "Listagem dos posts da categoria: {$idCat}";
    }
}
