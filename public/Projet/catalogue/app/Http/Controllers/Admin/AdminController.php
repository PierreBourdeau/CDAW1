<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use App;
use App\Models\Media;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Tag;
use App\Models\Comment;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlang');
    }

    public function editMediaView($id) {
        $data['media'] = Media::findOrFail($id);
        $data['tags'] = Tag::get();
        return view('edit-media', $data);
    }

    public function createMedia(Request $request) {
       if($request->has('type')){
        $media_type = $request->input('type');
        
        $rules = [
            'title' => 'required',
            'year' => 'required',
            'description' => 'required',
            'creator' => 'required',
            'type' => 'required',
        ];

        if ($media_type == 'Movie') {
            $rules['length'] = 'required';
            $rules['cast'] = 'required';
        } else if ($media_type == 'Serie') {
            $rules['seasons'] = 'required|numeric|min:1';
            $rules['cast'] = 'required';
        }

        $request->validate($rules);

        $input = $request->all();
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('front/img/media/', $name);
            $input['image'] = $name;
        }
        if ($media_type == 'Movie') {
            $newMedia = Movie::create($input);
        } else if ($media_type == 'Serie') {
            $newMedia = Serie::create($input);
        }
        
        $media = $newMedia->media()->create($input);
        $media->tags()->attach($request->input('tags'));

        return back();
        }
    }

    public function editMedia(Request $request) {

        if($request->has('id')){
        $media = Media::findOrFail($request->input('id'));
        $media_type = explode("\\", $media->media_type);
        $media_type = array_pop($media_type);

        $rules = [
            'title' => 'required',
            'year' => 'required',
            'id' => 'required',
        ];

        if ($media_type == 'Movie') {
            $rules['length'] = 'required';
            $rules['cast'] = 'required';
        } else if ($media_type == 'Serie') {
            $rules['seasons'] = 'required|numeric|min:1';
            $rules['cast'] = 'required';
        }

        $request->validate($rules);

        $input = $request->all();
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('front/img/media/', $name);
            if ($media->image != null) {
                if (file_exists(public_path('front/img/media/' . $media->image))) {
                    unlink(public_path('front/img/media/' . $media->image));
                }
                $input['image'] = $name;
            }
        }
        $media->update($input);
        $media->getMedia->update($input);
        return back();
        }
    }

    public function deleteMedia(Request $request) {
        $media = Media::findOrFail($request->input('id'));
        if (file_exists(public_path('front/img/media/' . $media->image))) {
            unlink(public_path('front/img/media/' . $media->image));
        }
        $movie = $media->getMedia()->delete();
        $media->delete();
        return back();
    }

    public function manageComments($status) {
        if($status == 'pending') {
            $data['comments'] = Comment::where('status', 'P')->get();
        } else if ($status == 'accepted') {
            $data['comments'] = Comment::where('status', 'A')->get();
        }
        $data['status'] = $status;
        return view('user.comments-management', $data);
    }
    public function deleteComment(Request $request) {
        $request->validate([
            'comment_id' => 'required',
        ]);
        Comment::findOrFail($request->input('comment_id'))->delete();
        return back();
    }
    public function validateComment(Request $request) {
        $request->validate([
            'comment_id' => 'required',
        ]);
        $comment = Comment::findOrFail($request->input('comment_id'));
        $comment->status = 'A';
        $comment->save();
        return back();
    }
}
