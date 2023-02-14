<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Controller
{
    //
    public function action(Request $request){
        
        $data = '';
        $search = $request->get('search');
        if($search != ''){
            $data = DB::table('tags')
            ->where('tag_name','LIKE','%'.$search.'%')->get()
            ;
        }
        return json_encode($data);
        
        
    }
}
