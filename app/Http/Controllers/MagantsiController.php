<?php
namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Content;
class MagantsiController extends Controller
{
    public function index(){
        return view('frontend.landing.index');
    }
    public function culture(){
        return view('frontend.landing.culture');
    }
    public function cultureType($type){
        $culture = Type::where('type',$type)->first();
        $types = Content::where('type', $type)->get();
        $selectType = Content::where('type', $type)->where('spotlight', 1)->orderBy('created_at', 'desc')->first();
        return view('frontend.culture.index',[
            'types' => $types,
            'culture' =>$culture,
            'selectType' => $selectType
        ]);
    }
    public function changeType($slug){
        // $dances = Content::where('type', 'Dance')->get();
        // $selectType = Content::find(Crypt::decryptString($id));
        $selectType = Content::where('slug', $slug)->first();
        $culture = Type::where('type',$selectType->type)->first();
        $types = Content::where('type', $selectType->type)->get();
        return view('frontend.culture.index',[
            'types' => $types,
            'culture' =>$culture,
            'selectType' => $selectType
        ]);
    }
    public function filter(Request $request) 
    {
        // dd($request->search);
        $magantsi = 'culture';
        $contents = Content::orWhere('title_eng','like', '%'.$request->search.'%')
                                ->orWhere('title_fil','like', '%'.$request->search.'%')
                                ->orWhere('body_eng','like', '%'.$request->search.'%')
                                ->orWhere('body_fil','like', '%'.$request->search.'%')
                                ->get();
        // dd($contents);
        return view('frontend.landing.search')->with('contents', $contents)->with('magantsi', $magantsi)->with('search', $request->search);
    }
}
