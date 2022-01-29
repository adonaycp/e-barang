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
      
  // public function gantiPassword(Request $request)
  // {
  //   // dd($request);
  //   $user = Auth::user();
  //   $user->name = $request->name;
  //   $user->username = $request->username;
  //   $user->password = Hash::make($request->password);
  //   $user->save();
  //   return view('profile.index');
  // }

  public function updateProfile(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'username' => 'required',
          'password' => 'required',
        ],[
          'required' => 'Kolom harus diisi'
        ]);
        // $barangs = Barang::all();
        // $categories = Category::all();
        $user = Auth::user()->id;
        $userPassword = Auth::user()->password;

        if (Hash::check($request->password, $userPassword)) {

          $users = DB::table('users')->where('id', $user)->update([
  
              'name' => $request->name,
              'username' => $request->username
          ]);

          return redirect('profile')->with('success', 'Data Sudah Terupdate');

        }else{
          return redirect('profile')->with('error', 'Password Salah!');

        }
        
    }

  public function updatePassword(Request $request)
    {
        $this->validate($request, [
          'password_lama' => 'required|min:6',
          'password_baru' => 'required|min:6',
          'password_konfirmasi' => 'required|min:6|same:password_baru',
        ],[
          'required' => 'Kolom harus diisi',
          'min' => 'Jumlah minimal karakter adalah 6 karakter',
          'same' => 'password konfirmasi tidak cocok'
        ]);
        // $barangs = Barang::all();
        // $categories = Category::all();
        $user = Auth::user()->id;
        $userPassword = Auth::user()->password;

        if (Hash::check($request->password_lama, $userPassword)) {

          $users = DB::table('users')->where('id', $user)->update([
  
              'password' => Hash::make($request->password_baru),
          ]);

          return redirect('profile')->with('success', 'Data Sudah Terupdate');

        }else{
          return redirect('profile')->with('error', 'Password Salah!');

        }
        
    }

}
