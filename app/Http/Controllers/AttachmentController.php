<?php

namespace App\Http\Controllers;
use App\Models\Glossary;
use App\Models\Attachment;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index($glossary)
    {
        return view('backend.attachments.index', [
            'glossary' => Glossary::with('attachments')->find(Crypt::decryptString($glossary)),
        ]);
    }

    public function store(Request $request, $glossary)
    {
   
        $glossary = Glossary::find(Crypt::decryptString($glossary));
     
        $request->validate([
            'media' => 'required',
        ]);

        if ($request->hasFile('media')) {

            $attachments = [];
    
            foreach ($request->file('media') as $file) {
                
                $attachmentInfo['media'] = $file->store('attachments', 'public');
                $attachmentInfo['glossary_id'] = $glossary->id;
                Attachment::create($attachmentInfo);
            }
        }

        return redirect()->route('attachments.index', Crypt::encryptString($glossary->id))->with('message', 'Attachment Successfully Added');
    }

    public function destroy($attachment)
    {
        $attachment = Attachment::findOrFail(Crypt::decryptString($attachment));

        if ($attachment->media && Storage::disk('public')->exists($attachment->media)) {
            Storage::disk('public')->delete($attachment->media);
        }

        $attachment->delete();

        return redirect()->route('attachments.index', Crypt::encryptString($attachment->glossary_id))->with('message', 'Attachment Successfully Deleted');
    }

    public function destroyAll($glossary)
    {
        $attachments = Attachment::where('glossary_id', Crypt::decryptString($glossary))->get();

        foreach ($attachments as $attachment) {
            
            $attachment = $attachment->media;
            Storage::disk('public')->delete($attachment);
        }

        $glossary_id = Crypt::decryptString($glossary);

        Attachment::where('glossary_id', $glossary_id)->delete();

        return redirect()->route('attachments.index', Crypt::encryptString($glossary_id))->with('message', 'All Attachments Successfully Deleted');
    }
}
