<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\Rules\NoMatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Publication;

class Update extends Controller
{
    public function upload(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'file' => 'required|max:2048|mimes:pdf'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withFailure("Upload failed.");
        }
        else{
                $publish = new Publication();
                $user = Auth::user();
                print($user);
                DB::table('users')->where('id', $user->id)->increment('pub_number');
                $publish -> id = $user->id;
                $publish -> title = $request->title;
                $publish -> description = $request->description;
                $publish -> pdf_link = basename(Storage::putFile('public/publications', $request->file('file')));
                $publish -> save();

                return redirect()->back()
                ->withSuccess("File Uploaded Successfully!");
                
            }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:6', new NoMatch],
            'new_confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->withFailure("Update failed.");
        }
        else{
            $user = Auth::user();
            DB::table('users')
            ->where('id', $user->id)
            ->update(['password'=> Hash::make($request->new_password)]);
            
            return redirect()->back()
            ->withSuccess("Password changed successfully!");
        }
    }

    public function newprofile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'degree' => 'required|max:255',
            'position' => 'required|max:255',
            'dept_id' => 'required',
            'file' => 'nullable|max:2048|mimes:jpeg,jpg,png'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->withFailure("Update failed.");
        }
        else{
            $user = Auth::user();
            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'name' => $request->name,
                'position' => $request->position,
                'degree' => $request->degree,
                'dept_id' => $request->dept_id,
                ]);
            if ($request->hasFile('file')){
                $image = DB::table('users')->where('id', $user->id)->first()->profile_image;
                if($image=="account.png"){     
                    DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'profile_image' => basename(Storage::putFile('public/images', $request->file('file')))
                    ]);
                }
                else{
                    Storage::delete('public/images/'.$image);
                    DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'profile_image' => basename(Storage::putFile('public/images', $request->file('file')))
                    ]);
                }
            }
            return redirect()->back()
            ->withSuccess("Profile updated successfully!");
        }
    }

    public function newedit(Request $request){
        $validator = Validator::make($request->all(), [
            'pub_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withFailure('Update failed');
        }
        else{
            if(Auth::user()->id == DB::table('publications')
            ->where('pub_id', $request->pub_id)->value('id')){
                DB::table('publications')
                ->where('pub_id', $request->pub_id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description
                ]);
                
                return redirect()->back()
                ->withSuccess("Details updated successfully!");   
            }
            else{
                return redirect()->back()
                ->withFailure("Update failed.");
            }
        }
    }

    public function delete(Request $request){
        if(Auth::user()->id == DB::table('publications')
        ->where('pub_id', $request->pub_id)->value('id')){
            DB::table('publications')
            ->where('pub_id', $request->pub_id)
            ->delete();
        DB::table('users')->where('id', Auth::user()->id )->decrement('pub_number');
            return redirect()->route('home');
        }
        else{
            return redirect()->back()
            ->withFailure("Delete operation failed.");
       }
    }
}