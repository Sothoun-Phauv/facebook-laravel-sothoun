<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Roles::with(['user'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = new Roles();
        $role -> user_id = $request -> user_id;
        $role -> role = $request -> role;
        $role -> status = $request -> status;
        $role-> save();
        return response()->json(['message'=>'Created','data'=> $role]);
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
        return Roles::with('user')->findOrFail($id);
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
        $role = Roles::findOrFail($id);
        $role -> user_id = $request -> user_id;
        $role -> role = $request -> role;
        $role -> stautus = $request -> stautus;
        $role -> save();
        return response()->json(['message' =>'Updated','data' => $role],202);
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
        return Roles::destroy($id);
    }
}
