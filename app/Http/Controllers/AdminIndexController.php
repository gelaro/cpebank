<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index(){

    }

    public function promotion(){
        $promotion = Promotion::all();

        return view('admin.home.5',[
            'title' => 'Promotion',
            'content_header'=> 'โปรโมชั่น/แนะนำบริการ',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'promotion' => $promotion,

        ]);
    }

    public function promotion_del(Request $request){
        $pid = $request->get('id');
        $promotion = Promotion::find($pid);
        
        $promotion->delete();

        return response()->json([
            'status' => true,
        ]);
    }

    
    public function promotion_add(Request $request){
        $title = $request->get('title');
        $description = $request->get('description');
        $promotion = new Promotion;
        $promotion->promotion_name = $title;
        $promotion->description = $description;
        $promotion->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function promotion_edit(Request $request){
        $promotion = Promotion::find($request->get('id')); 
        $title = $request->get('title');
        $description = $request->get('description');

        $promotion->promotion_name = $title;
        $promotion->description = $description;
        $promotion->save();

        return response()->json([
            'status' => true,
        ]);
    }
}
