<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\BasicSetting as BS;
use App\Models\Media;
use App\Models\Movie;
use Config;
use Session;
use Auth;


class FrontendController extends Controller
{

    public function __construct()
    {
        $bs = BS::first();
    }



    public function index()
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $lang_id = $currentLang->id;
        $bs = $currentLang->basic_setting;

        $data['medias'] = Media::select('id','image')->get();

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

    public function getSwiper($id) {
        $user = Auth::user();
        if($id != 'like') {
            $playlist = $user->playlists()->findOrFail($id);
            $data['medias'] = $playlist->medias;
            $data['title'] = $playlist->name;
        } else {
            $liked = $user->liked;
            $data['medias'] = [];
            foreach ($liked as $like) {
                array_push($data['medias'], $like->media);
            }
            $data['title'] = __('Like');
        }
        return view('partials.swiper', $data);
    }
}
