<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Publication;
use App\User;

class Pages extends Controller
{
    public function main(){
      $users = DB::table('users')
      ->join('departments', 'users.dept_id', '=', 'departments.dept_id')
      ->get();

     return view('main')->withUsers($users);
    }

    public function account() {
      $user = DB::table('users')
      ->join('departments', 'users.dept_id', '=', 'departments.dept_id')
      ->where('id', Auth::user()->id)
      ->first();

      $departments = DB::table('departments')
      ->get();
      
     return view('account')->withUser($user)->withDepartments($departments);
    }

    public function change()
    {
        return view('change');
    } 
   
    public function faculty(Request $request){
      $id  = $request->id ;
      $user = DB::table('users')
      ->join('departments', 'users.dept_id', '=', 'departments.dept_id') 
      ->where('id', $id)
      ->first();

      $publications = DB::table('users')
      ->join('publications', 'users.id', '=', 'publications.id') 
      ->where('users.id', $id)
      ->get();
      return view('faculty')->withUser($user)->withPublications($publications);
    }

    public function publish(){
      return view('publish');
    }

    public function edit(Request $request){
      $pub_id  = $request->pub_id;
      $publication = DB::table('publications')
      ->where('pub_id', $pub_id)
      ->where('id', Auth::user()->id)
      ->first();
      return view('edit')->withPublication($publication);
    }
}
