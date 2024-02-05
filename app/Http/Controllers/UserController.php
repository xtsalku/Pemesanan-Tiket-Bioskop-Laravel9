<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Login(Request $request){

        $request->validate(
            [
                'username'=>'required',
                'password'=>'required',
            ],[
                'username.required'=>'Username Wajib Di Isi',
                'password.required'=>'Password Wajib Di Isi',
            ]
        );
        $infologin =[
            'username'=>$request->username,
            'password'=>$request->password,

        ];
        // if(Auth::attempt($infologin)){
        //     return redirect('admin');
        // }else{
        //     return redirect('/Login')->withErrors('User atau Password Salah');
        // }
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

    
            if ($user->role == 'admin') {
                return redirect('/admin');
            } elseif ($user->role == 'user') {
                return redirect('/');
            }else{
                    return redirect('/login')->withErrors('User atau Password Salah');
                }
        }
    
        // Authentication failed
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function register(Request $request){

        $request->validate(
            [
                'nama'=>'required',
                'username'=>'required',
                'password'=>'required'
            ],[
                'nama.required'=>'Nama Wajib Di Isi',
                'username.required'=>'Username Wajib Di Isi',
                'password.required'=>'Password Wajib Di Isi'
            ]
        );
        $infologin =[
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>bcrypt($request->password)

        ];
        $credentials = $request->only('nama','username', 'password');
    
        if ($credentials!=null) {
            // Authentication passed
                DB::table('users')->insert([
        
                    'nama'=> $request->nama,
                    'username'=> $request->username,
                    'password'=> bcrypt($request->password)
                ]);
        
                return redirect('/');
                
            }else{
                    return redirect('/register')->withErrors('Register Gagal');
                }
    }
    public function deltiket($id){
        $idd = decrypt($id);
        DB::table('tb_pesan')->where('id',$idd)->delete();
        $user = Auth::user();
        $id=encrypt($user->id);
        return redirect("/");
    }
    function edittiket($id){
        $idd = decrypt($id);
        $bioskop = DB::table('tb_pesan')->where('id',$idd)->get();
        return view('edit',['bioskop' => $bioskop]);
    }
    function update(Request $request){
        $user = DB::table('tb_pesan')->where('id', $request->id)->first();
        
        $updateData = [
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'judul_film' => $request->judul_film,
            'jam' => $request->jam,
            'kursi' => $request->kursi,
        ];
        
        DB::table('users')->where('id', $request->id)->update($updateData);
        return redirect ('/');
        
    }
}
