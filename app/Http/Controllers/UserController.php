<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Crypt;
use Input;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( array('stud' => array( ['name' => 'Abigail', 'country' => 'Philippines'], 
                                                        ['name' => 'Mark', 'country' => 'Japan'],
                                                        ['name' => 'Michael', 'country' => 'China'],
                                                        ['name' => 'Ailee', 'country' => 'Belgium'],
                                                        ['name' => 'Anna', 'country' => 'Germany'],
                                                        ['name' => 'Ariston', 'country' => 'Vietnam'],
                                                        ['name' => 'Ken', 'country' => 'Cambodia'])));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Request::ajax())
        {
            echo 'detected';
        }
        else
        {
            echo 'not detected';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if( $request != null)
       {
            $uname = Input::get('uname');
            $pwd = Input::get('passwd');
            
            if( !empty($uname) && !empty($pwd) )
            {
                $id = DB::table('student')->insertGetId(
                    ['username' => $uname , 'pass_hash' => Crypt::encrypt($pwd) ]
                );
                return $id;
            }
            else
            {
                return 'not ok';
            }
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
