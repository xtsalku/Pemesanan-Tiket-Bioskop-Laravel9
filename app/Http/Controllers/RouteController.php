<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function index(){    
        $userId = Auth::id();
            
        $bioskop = DB::table('tb_pesan')->where('id_user', $userId)->get(); 
        
        return view('index',['bioskop' => $bioskop]);
    }

    public function login(){    
        return view ('login');
    }
    public function register(){
       
        return view ('register');
    }
    public function pesan($id){ 
        
        $bioskop = DB::table('tb_users')->where('id',$id)->get();
        return view('pesan',['bioskop' => $bioskop]);
    }
    public function pesanadd(Request $request){ 
        DB::table('tb_pesan')->insert([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'judul_film' => $request->judul_film,
            'jam' => $request->jam,
            'kursi' => $request->selected_kursi,
        ]); 
        return redirect ('/');
    }
    
}
