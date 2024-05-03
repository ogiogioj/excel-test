<?php

namespace App\Http\Controllers;

use App\Models\Board;

use Illuminate\Http\Request;
use App\Exports\BoardsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;

class BoardController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'body' => [
                'required',
                'string',
                'max:255'
            ],
        ]);
        Board::create([
            'body' => $input['body'],
            'user_id' => Auth::id()
        ]);
        return redirect()->route('boards.list');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards = Board::select('body', 'created_at', 'id')
            ->latest()
            ->paginate(20);


        return view('boards.list', ['boards' => $boards]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {


        return view('boards.detail', ['board' => $board]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        $this->authorize('update', $board);

        $input = $request->validate([
            'body' => [
                'required',
                'string',
                'max:255'
            ],
        ]);
        $board->body = $input['body'];
        $board->save();

        return redirect()->route('boards.list');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {

        $this->authorize('update', $board);
        $board->delete();

        return redirect()->route('boards.list');
    }

    /* Laravel-Excel */
    public function excel()
    {

        return Excel::download(new BoardsExport(), 'products.xlsx');
    }


   /*Laravel-PDF*/

    public function createPDF(Board $board)
    {

        $data = Board::select('body', 'created_at')
        ->where('id',$board->id)
        ->get();

        $pdf = PDF::loadView('boards.pdf', ['data' => $data]);

        return $pdf->download('boards.pdf');
    }
}
