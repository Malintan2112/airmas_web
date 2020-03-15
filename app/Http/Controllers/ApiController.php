<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Events\MyEvent;

class ApiController extends Controller
{
	public function detail($id){
		$data = DB::table('tbl_user')->where('id',$id)->first();

		return response()->json(['data'=>$data]);
	}
	public function login(Request $request){
		$data = DB::table('tbl_user')->where('username',$request->username)->where('password',md5($request->password))->first();
		if ($data!= null) {
			# code...
		return response()->json(['message'=>"sukses","data"=>$data]);

		}
		return response()->json(['message'=>"gagal"]);


	}
	public function login_scan(Request $request,$uuid_login){
		$data['uuid_login'] = $uuid_login;
		DB::table('tbl_user')->where('id',$request->id)->update($data);
		event(new MyEvent($uuid_login));

	}
    //
	public function distance(Request $request){
    	// dd("masuk");
		$earthRadius = 6371000;

		$fromCoordinate = explode(",", $request->fromCoordinate);
		$toCoordinate = explode(",", $request->toCoordinate);
		$latFrom = deg2rad($fromCoordinate[0]);
		$lonFrom = deg2rad($fromCoordinate[1]);
		$latTo = deg2rad($toCoordinate[0]);
		$lonTo = deg2rad($toCoordinate[1]);

		$latDelta = $latTo - $latFrom;
		$lonDelta = $lonTo - $lonFrom;

		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
			cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
		$distance =  $angle * $earthRadius;
		$data['from_address'] = $request->fromAddress;
		$data['to_address'] = $request->toAddress;
		$data['from_coordinate'] = $request->fromCoordinate;
		$data['to_coordinate'] =$request->toCoordinate;
		$data['distance'] =$distance;

		DB::table('peta')->insert($data);
		return response()->json(['fromAddress'=>$request->fromAddress,'toAddress'=>$request->toAddress,'fromLat'=>$fromCoordinate[0],'fromLong'=>$fromCoordinate[1],'toLat'=>$toCoordinate[0],'toLong'=>$toCoordinate[1],'distance'=>round($distance/1000,2)]);
	}
	public function api (){
		$data['masuk'] = "oye";
		return response()->json(['supplier'=>DB::table('supplier')->get(),'customer'=>DB::table('supplier')->get()]);
	}
	public function posthaversineGreatCircleDistance(Request $request){
		$earthRadius = 6371000;
		$latFrom = deg2rad($request->latitudeFrom);
		$lonFrom = deg2rad($request->longitudeFrom);
		$latTo = deg2rad($request->latitudeTo);
		$lonTo = deg2rad($request->longitudeTo);
		$latDelta = $latTo - $latFrom;
		$lonDelta = $lonTo - $lonFrom;
		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
			cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
		// return $angle * $earthRadius;
		return response()->json(['jarak'=>$angle * $earthRadius]);

	}
	public function haversineGreatCircleDistance(
		$latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
	{
  // convert from degrees to radians
		$latFrom = deg2rad($latitudeFrom);
		$lonFrom = deg2rad($longitudeFrom);
		$latTo = deg2rad($latitudeTo);
		$lonTo = deg2rad($longitudeTo);

		$latDelta = $latTo - $latFrom;
		$lonDelta = $lonTo - $lonFrom;

		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
			cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
		// return $angle * $earthRadius;
		return response()->json(['jarak'=>$angle * $earthRadius]);

	}
	public function getDistanceBetween($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi') 
	{ 
		$theta = $longitude1 - $longitude2; 
		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
		$distance = acos($distance); 
		$distance = rad2deg($distance); 
		$distance = $distance * 60 * 1.1515; 
		switch($unit) 
		{ 
			case 'Mi': break; 
			case 'Km' : $distance = $distance * 1.609344; 
		} 
		return (round($distance,2)); 
	}
}

