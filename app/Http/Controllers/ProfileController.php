<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Profile;
use DB;
use Auth;
use Hash;

class ProfileController extends Controller
{
 /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $category = Category::get()->all();
    // $profile = Profile::get();

    return view('profile.index');
  }

    // if(!(Hash::check($request->get('current_password'), Auth::user()->password))){
    //   return back()->with('error','Password saat ini tidak sama dengan yang diisi');
    // }
    // dd($user);
      
  public function gantiPassword(Request $request)
  {
    // dd($request);
    $user = Auth::user();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->save();
    return view('profile.index');
  }

}
