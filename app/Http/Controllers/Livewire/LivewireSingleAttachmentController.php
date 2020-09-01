<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Controllers\Concerns\StoresFormSubmissions;
use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;

class LivewireSingleAttachmentController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.livewire.attachment-single');
    }

    public function store(StoreMultipleUploadsRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ]);
ld('here', $request->media);
        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
