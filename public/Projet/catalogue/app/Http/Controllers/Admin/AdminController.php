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
        return view('edit-media', $data);
    }

    public function createMedia() {
        if($request->has('type')){
        $media_type = Media::findOrFail($request->input('type'));

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
        }

        $request->validate($rules);

        $input = $request->all();
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/front/img/media/', $name);
            $input['image'] = $name;
        }
        $movie = new Movie;
        $movie->insert($input);
        $movie->save();

        $media = new Media;
        $media->insert($input);

        $movie->media->save($media);
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
            'description' => 'required',
            'creator' => 'required',
            'id' => 'required',
        ];

        if ($media_type == 'Movie') {
            $rules['length'] = 'required';
            $rules['cast'] = 'required';
        }

        $request->validate($rules);

        $input = $request->all();
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/front/img/media/', $name);
            if ($media->image != null) {
                if (file_exists(base_path('../public/front/img/media/' . $media->image))) {
                    unlink(base_path('../public/front/img/media/' . $media->image));
                }
            }
            $input['image'] = $name;
        }
        $media->update($input);
        $media->getMedia->update($input);
        return back();
        }
    }

    public function deleteMedia(Request $request) {
        $media = Media::findOrFail($request->input('id'));
        $movie = $media->getMedia;
        $media->delete();
        $movie->delete();
        return back();
    }
}
