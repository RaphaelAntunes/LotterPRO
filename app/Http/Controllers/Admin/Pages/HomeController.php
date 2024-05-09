<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.pages.home');
    }


    public function pedidos()
    {
        return view('admin.pages.pedidos.recharge');
    }

    public function order()
    {
        return view('admin.pages.pedidos.recharge-order');
    }
    public function saquepremiacao()
    {
        return view('admin.pages.pedidos.saquepremiacao');
    }

    public function saquesaldo()
    {
        return view('admin.pages.pedidos.saquesaldo');
    }
    public function atualizarcarteira()
    {
        return view('admin.pages.pedidos.atualizarcarteira');
    }    
    public function perfil()
    {
        return view('admin.pages.pedidos.perfil');
    }
    
    public function bets()
    {
        return view('admin.pages.pedidos.bets');
    }
    public function directs()
    {
        return view('admin.pages.pedidos.directs');
    }
    









    

}
