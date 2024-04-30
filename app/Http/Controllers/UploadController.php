<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUploadRequest;
use App\Http\Requests\UpdateUploadRequest;

class UploadController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function uploadForm()
    {
        return view('uploads.view');
    }

    public function uploadFile(Request $request)
    {

        //$request->picture->store('public/img'); // storage/app/pubilc 폴더로 파일이 업로드가 됩니다.

        $fileName = $request-> file('picture')->getClientOriginalName();
        Upload::create([
            'image_name' =>  $fileName,
            'image_path' => $request->file('picture')->storeAs('public/img',$fileName),
            'user_id' => Auth::id()
        ]);
        return redirect()->route('uploads.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreUploadRequest $request)
    // {
    //     //
    // }


    public function index()
    {
        $uploads = Upload::select('image_name', 'created_at', 'id')
            ->latest()
            ->get();

        return view('uploads.list', ['uploads' => $uploads]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Upload $upload)
    {
        return view('uploads.detail', ['upload' => $upload]);
    }



    public function download(Upload $upload)
    {
        $filePath = storage_path('app/public/img/' . $upload->image_name);
        // 파일 다운로드 응답
        return response()->download($filePath);
    }








    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUploadRequest $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
