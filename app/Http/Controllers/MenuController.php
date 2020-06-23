<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allFuncationTest()
    {

        $items = DB::select("SELECT id, label, link_url, parent_id FROM dyn_menu ORDER BY parent_id, id ASC");
        foreach ($items as  $items){
            if ($items->parent_id != 0) {
               // print $id = $items->parent_id;
                $sub_menu[$items->id]['label'] = $items->label;
                $sub_menu[$items->id]['link'] = $items->link_url;
            } else {
                $sub_menu[$items->id]['parent'] = $items->parent_id;
                $sub_menu[$items->id]['label'] = $items->label;
                $sub_menu[$items->id]['link'] = $items->link_url;
                /*if (empty($parent_menu[$items->parent_id]['count'])) {
                    $parent_menu[$items->parent_id]['count'] = 0;
                }*/
                //$parent_menu[$items->parent_id]['count']++;
            }
        }

        echo "<pre>";
        print_r($sub_menu);
        echo "</pre>";
    }

    public function allFuncation()
    {
        $row = DB::select("SELECT * FROM dyn_menu");
        $menus = array();
        $parent_menu = array();
        foreach ($row as $index => $row) {
            if ($row->parent_id) {
                $id = $row->parent_id;

                $menus['menu_'. $id]['submenu'][] = [
                    'id' => $row->id,
                    'label' => $row->label,
                    'link_url' => $row->link_url,
                ];
            }else{

                $id = $row->id;

                $menus['menu_'. $id] = [
                    'id' => $row->id,
                    'label' => $row->label,
                    'link_url' => $row->link_url,
                ];
            }
        }


        //$parent_menu[$menus->submenu];
       //echo $parent_menu;.
        $menuss = array();
       echo $arraySize=count($menus);
        for($i = 0; $i < $arraySize; $i++) {
            $menuss= $menus->menu_1;
        }

        echo "<pre>";
        print_r($menuss);
        echo "</pre>";

    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Menu $menu)
    {
        //
    }


    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
