<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Input;
use DB;
use Hash;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = DB::table('attendance')->get();
          return response()->json(array('user' => $data), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $request->uname && $request->passwd && $request->_token )
        {
            $users = DB::table('user')
                        ->select('user_id','password')
                        ->where('username', $request->uname)
                        ->first();

            if($users){
                if (Hash::check($request->passwd, $users->password))
                {
                    $id = DB::table('attendance')->insertGetId(
                        ['fk_user_id' => $users->user_id, 'created_at' => date('Y-m-d H:i:s') ]
                    );

                    if($id)
                        return Response::json(array('user_id' => $users->user_id), 200);
                    else
                        return Response::json(array('message' => 'No Content'), 204);
                }
            }
            return Response::json(array('message' => 'No Content'), 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
