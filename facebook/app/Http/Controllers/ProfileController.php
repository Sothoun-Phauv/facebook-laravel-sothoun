<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Profile::with(['user'])->get();
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
        $request->validate([
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);
        $request->file('image')->store('public/images');

        $profile = new Profile();
        $profile -> user_id = $request -> user_id;
        $profile -> city = $request ->city;
        $profile -> image = $request ->image;
        $profile->image = $request->file('image')->hashName();
        $profile -> save();
        return response()->json(['message'=>'Created', 'data' => $profile],201);

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
        return Profile::with(['user'])->findOrFail($id);
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
        $request->validate([
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);
        $request->file('image')->store('public/images');

        $profile = Profile::findOrFail($id);
        $profile -> user_id = $request -> user_id;
        $profile -> city = $request ->city;
        $profile -> image = $request ->image;
        $profile->image = $request->file('image')->hashName();

        $profile -> save();
        return response()->json(['message'=>'Updated', 'data' => $profile],201);
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
        return Profile::destroy($id);
    }
}
