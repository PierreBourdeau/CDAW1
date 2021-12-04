<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\BasicSetting as BS;
use App\Models\Media;
use App\Models\Movie;
use App\Models\Tag;
use Config;
use Session;
use Auth;


class FrontendController extends Controller
{

    public function __construct()
    {
        $bs = BS::first();
    }



    public function index($content, $tag = null)
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $lang_id = $currentLang->id;
        $bs = $currentLang->basic_setting;

        if($content == 'home') {
            if (isset($tag)) {
                 $data['medias'] = Tag::where('name', $tag)->first()->medias()->select('id','image')->get();
                 $data['title'] = $tag;
                 return view('partials.swiper', $data);               
            } else {
            $data['medias'] = Media::select('id','image')->get();
            $data['tags'] = Tag::get();
            }
        } else if ($content == 'movies') {
            if (isset($tag)) {
                $data['medias'] = Tag::where('name', $tag)->first()->medias()->where('media_type', 'App\Models\Movie')->get();
                $data['title'] = $tag.' '.__('Movies');
                return view('partials.swiper', $data);
            } else {
                $data['medias'] = Media::where('media_type', 'App\Models\Movie')->select('id','image')->get();
                $data['tags'] = Tag::whereHas('medias', function($query) {
                    $query->where('media_type', 'App\Models\Movie');
                })->get();
            }
        }        

        return view('index', $data);
    }


    public function changeLanguage($lang, $type = 'website')
    {
        session()->put('lang', $lang);
        app()->setLocale($lang);

        return redirect()->route('front.index');
    }

    public function addContentForm($name) {
        return view('user.partials.add-content-form', ['name' => $name]);
    }

    public function getMedia($id) {
        $data['media'] = Media::findOrFail($id);
        return view('partials.media-modal', $data);
    }

    public function getPlaylist($id) {
        $user = Auth::user();
        $playlist = $user->playlists()->findOrFail($id);
        $data['medias'] = $playlist->medias;
        $data['title'] = $playlist->name;
        return view('partials.swiper', $data);
    }
    public function getLikes() {
        $user = Auth::user();
        $liked = $user->liked;
        $data['medias'] = [];
        foreach ($liked as $like) {
            array_push($data['medias'], $like->media);
        }
        $data['title'] = __('Like');
        return view('partials.swiper', $data);
    }
}
