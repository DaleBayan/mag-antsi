@extends('layouts.backend.app')

@section('content')

<x-backend.alert-success />

<div class="container">
    <h2 class="my-3 text-success">Attachments of {{ $glossary->term_eng }}</h2>
    <div class="row">
        <div class="col-4">
           
            <form
                method="POST"
                action="{{ route('attachments.store', Crypt::encryptString($glossary->id)) }}"
                enctype="multipart/form-data"
                class="p-3 card"
                x-data="{ filesUploaded: false }">
                @csrf
                <h5 class="card-title">Upload Attachments</h5>
                <input
                    type="file"
                    name="media[]"
                    multiple
                    x-on:change="filesUploaded = $event.target.files.length > 0">
                @error('media')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="mt-5">
                    <a href="{{ route('glossaries.index') }}" class="btn btn-secondary">Go Back</a>
                    <button
                        class="btn btn-success"
                        x-show="filesUploaded"
                        x-if="filesUploaded">
                        Save
                    </button>
                </div>
            </form>
            
        </div>
        <div class="col-8">
            <div class="p-5 card">
                <div class="row">
                    @forelse ($glossary->attachments as $attachment)
                        <div class="col-6 p-2">
                            <img src="{{ asset('storage/' . $attachment->media) }}" alt="" class="p-1 my-1 border border-2 border-success w-100 rounded shadow">
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAttachmentModal{{ $attachment->id }}">Delete</button>
                        </div>
                        {{-- [START] - Delete Attachment Modal --}}
                        <div class="modal fade" id="deleteAttachmentModal{{$attachment->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Are you sure you want to delete this attachment?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('attachments.destroy', Crypt::encryptString($attachment->id)) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success">Confirm</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- [END] - Delete Attachment Modal --}}
                    @empty
                        <h1 class="text-center text-danger">No Attachments</h1>
                    @endforelse
                    
                </div>
            </div>
            
            @if(count($glossary->attachments) > 1)
            <button class="my-3 btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAllAttachmentModal">Delete All Attachments</button>
            {{-- [START] - Delete All Attachments Modal --}}
            <div class="modal fade" id="deleteAllAttachmentModal" tabindex="-1">
               <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                   Are you sure you want to delete all attachments?
                   </div>
                   <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                   <form method="POST" action="{{ route('attachments.destroyAll', Crypt::encryptString($glossary->id)) }}">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-success">Confirm</button>
                   </form>
                   </div>
               </div>
               </div>
           </div>
           {{-- [END] - Delete All Attachments Modal --}}
            @endif
           

        </div>
    </div>

</div>

@endsection

