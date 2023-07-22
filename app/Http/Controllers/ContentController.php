<?php

namespace App\Http\Controllers;
use App\Models\Type;
use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ContentController extends Controller
{
    public function index()
    {
        return view('backend.contents.index', [
            'contents' => Content::select('id', 'type', 'title_eng', 'created_at', 'spotlight')->get(),
        ]);
    }

    public function create()
    {
        return view('backend.contents.create', [
            'types' => Type::select('type')->get(),
        ]);
    }

    public function store(StoreContentRequest $request)
    {
        $content = $request->validated();

        if($request->hasFile('mag_antsi')) {
            $content['mag_antsi'] = $request->file('mag_antsi')->store('mag-antsi', 'public');
        }

        if($request->media_type === 'Embed') {
            $content['media'] = $request->embed;
        }
        else {
            if($request->hasFile('media')) {
                $content['media'] = $request->file('media')->store('media', 'public');
            }
        }

        $content['spotlight'] = $request->spotlight === 'on' ? 1 : 0;
        $content['slug'] = Str::slug($request->title_eng);

        Content::create($content);

        return redirect()->route('contents.index')->with('message', 'Content Successfully Created');
    }
}
