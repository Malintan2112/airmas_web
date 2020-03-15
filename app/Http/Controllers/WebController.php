<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class WebController extends Controller
{
    //
	public function getLogin(){
		$cek = DB::table('tbl_user')->where('uuid_login',Session::get('uuid_login'))->first();
		if ($cek !=null) {
			Session::put('username',$cek->username);
			Session::put('id',$cek->id);
			return redirect('home');
		}
		return view('login');
	}
	public function createUser(Request $request){
		$data['name'] = $request->first_name." ".$request->seccond_name;
		$data['email']=$request->email;
		$data['password'] =md5($request->password);
		$data['username'] = $request->username;
		DB::table('tbl_user')->insert($data);
		Session::put('message','Creat User Success');
		return redirect('register');
	}
	public function postLogin(Request $request){
		$data = DB::table('tbl_user')->where('username',$request->username)->where('password',md5($request->password))->first();

		if($data!=null){
			Session::put('username',$request->username);
			Session::put('id',$data->id);
			return redirect('home');
		}
		Session::put('message_alert','tidak di temukan');
		return redirect()->back();
	}
	public function postLogout(Request $request){
		$data['uuid_login'] = '-';
		DB::table('tbl_user')->where('id',Session::get('id'))->update($data);
		Session::put('username',null);
		Session::put('id',null);
		Session::put('uuid_login',null);
	// dd(Session::get('uuid_login'));

		return redirect('home');
	}
}
