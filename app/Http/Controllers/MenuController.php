<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\Privillage;
use App\Models\Role;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $getMenu=Privillage::get();
        return view('menu',['priv'=>$getMenu]);
    }
    public function addPrive(){
        $getMenu=Menu::get();
        $getRole=Role::get();
        $getSubMenu=SubMenu::get();
        return view('add_prive',['menu'=>$getMenu,'submenu'=>$getSubMenu,'role'=>$getRole]);
    }
    public function addPriveAdd(Request $req){
        foreach($req->menu as $menus){
            $menu[]=$menus;
        }
        foreach($req->submenu as $submenus){
            $menusub[]=$submenus;
        }
        $arrResult=array(['menu'=>$menu,'sub_menu'=>$menusub]);
        $convertjson=json_encode($arrResult);
        $insert=Privillage::create([
            'role_id'=>$req->role,
            'menuable_id'=>$convertjson,
            'menu_type'=>"Menu"
        ]);

    }
}
