<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Exports\ExcelExport;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Maatwebsite\Excel\Facades\Excel;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::select('body', 'created_at', 'id')
            ->latest()
            ->paginate(10);


        return view('comments.comment', ['comments' => $comments]);
    }


     public function excel()
    {

        $headings =  ['ID', 'Body', 'User Id' , 'Created At', 'Updated At'];


      return Excel::download(new ExcelExport(Comment::class, $headings), 'comments.xlsx');
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
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
