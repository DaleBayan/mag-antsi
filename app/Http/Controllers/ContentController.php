<?php

namespace App\Http\Controllers;
use App\Models\Type;
use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $contentInfo = $request->validated();

        if($request->hasFile('mag_antsi')) {
            $contentInfo['mag_antsi'] = $request->file('mag_antsi')->store('mag-antsi', 'public');
        }

        if($request->media_type === 'Embed') {
            $contentInfo['media'] = $request->embed;
        }
        else {
            if($request->hasFile('media')) {
                $contentInfo['media'] = $request->file('media')->store('media', 'public');
            }
        }

        $contentInfo['spotlight'] = $request->spotlight === 'on' ? 1 : 0;
        $contentInfo['slug'] = Str::slug($request->title_eng);

        Content::create($contentInfo);

        return redirect()->route('contents.index')->with('message', 'Content Successfully Created');
    }

    public function edit($content)
    {

        return view('backend.contents.edit', [
            'content' => Content::find(Crypt::decryptString($content)),
            'types' => Type::select('type')->get(),
        ]);
    }

    public function update(UpdateContentRequest $request, $content)
    {
        $content = Content::find(Crypt::decryptString($content));

        $contentInfo = $request->validated();
    
        if ($request->hasFile('mag_antsi')) {
            // Delete the old mag_antsi file if it exists
            if ($content->mag_antsi && Storage::disk('public')->exists($content->mag_antsi)) {
                Storage::disk('public')->delete($content->mag_antsi);
            }
            $contentInfo['mag_antsi'] = $request->file('mag_antsi')->store('mag-antsi', 'public');
        }

        if ($request->media_type === 'Embed') {
            $contentInfo['media'] = $request->embed;
        } else {
            if ($request->hasFile('media')) {
                // Delete the old media file if it exists
                if ($content->media && Storage::disk('public')->exists($content->media)) {
                    Storage::disk('public')->delete($content->media);
                }
                $contentInfo['media'] = $request->file('media')->store('media', 'public');
            }
        }

        $contentInfo['spotlight'] = $request->spotlight === 'on' ? 1 : 0;
        $contentInfo['slug'] = Str::slug($request->title_eng);

        $content->update($contentInfo);

        return redirect()->route('contents.index')->with('message', 'Content Successfully Updated');
    }

    public function destroy($content)
    {
        $content = Content::findOrFail(Crypt::decryptString($content));

        if ($content->media && Storage::disk('public')->exists($content->media)) {
            Storage::disk('public')->delete($content->media);
        }

        if ($content->mag_antsi && Storage::disk('public')->exists($content->mag_antsi)) {
            Storage::disk('public')->delete($content->mag_antsi);
        }

        $content->delete();

        return redirect()->route('contents.index')->with('message', 'Content Successfully Deleted');
    }

    public function show($content)
    {

        return view('backend.contents.show', [
            'content' => Content::find(Crypt::decryptString($content)),
        ]);
    }

}
