<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Playlist;
use DB;
use App;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlang');
    }

    public function index()
    {
        $data['user'] = Auth::user();
        return view('user.dashboard', $data);
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->email.',email',
            'username' => 'required|unique:users,username,'.Auth::user()->username.',username',
        ]);

        $input = $request->all();
        $current_user = Auth::user();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/front/img/user/', $name);
            if ($current_user->photo != null) {
                if (file_exists(base_path('../public/front/img/user/' . $current_user->photo))) {
                    unlink(base_path('../public/front/img/user/' . $current_user->photo));
                }
            }
            $input['photo'] = $name;
        }
        $current_user->update($input);
        return back();
    }

    public function reset(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $user = Auth::user();

        if (!empty($user->password)) {
            if (!Hash::check($request->password, $user->password)) {
                return back()->with('error', __('Current password Does not match.'));
            }
        }

        if ($request->password == $request->confirmation_password) {
            $input['password'] = Hash::make($request->password);
        } else {
            return back()->with('error', __('New password and confirmation do not match'));
        }

        $user->update($input);

        return back();
    }

    public function createPlaylist(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);
        $user = Auth::user();
        $playlist = $user->playlists()->create([
            'name' => $request->input('name'),
        ]);
        $data['user'] = Auth::user();
        return view('partials.playlist-list', $data);
    }

    public function deletePlaylist(Request $request) {
        $request->validate([
            'playlist_id' => 'required',
        ]);
        $user = Auth::user();
        Playlist::findOrFail($request->input('playlist_id'))->delete();
        $data['user'] = $user;
        return view('partials.playlist-list', $data);
    }

    public function like(Request $request) {
        $request->validate([
            'media_id' => 'required'
        ]);
        $user = Auth::user();
        $like = $user->liked()->where('media_id', $request->input('media_id'));
        if($like->exists()) {
            $like->delete();
        } else {
            $user->liked()->create([
            'media_id' => $request->input('media_id'),
        ]);
        }
        $data['user'] = $user;
        return view('partials.liked-list', $data);
    }

    public function addMediaToPlaylist(Request $request) {
        $request->validate([
            'media_id' => 'required',
            'playlist_id' => 'required'
        ]);
        $user = Auth::user();
        $playlist = $user->playlists()->findOrFail($request->input('playlist_id'));
        $playlist->medias()->syncWithoutDetaching($request->input('media_id'));
        return back();
    }

    public function removeMediaFromPlaylist(Request $request) {
        $request->validate([
            'media_id' => 'required',
            'playlist_id' => 'required'
        ]);
        $user = Auth::user();
        $playlist = $user->playlists()->findOrFail($request->input('playlist_id'));
        $playlist->medias()->detach($request->input('media_id'));
        return back();
    }

    public function addToPlaylistList($media_id) {
        $data['user'] = Auth::user();
        $data['media'] = $media_id;
        return view('partials.add-to-playlist-modal', $data);
    }

    public function postComment(Request $request) {
        $request->validate([
            'media_id' => 'required',
            "comment" => 'required',
        ]);
        $user = Auth::user();
        $comment = $user->comments()->create([
            'media_id' => $request->input('media_id'),
            'comment' => $request->input('comment'),
        ]);
        $data['comment'] = $comment;
        return view('partials.comment', $data);
    }
}
