<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email')
            ->paginate(10);


        return view('users.list', ['users' => $users]);
    }


    public function excel()
    {

    $headings =  ['ID', 'Name', 'Email' , 'Email Verifiled At','Created At', 'Updated At'];

      return Excel::download(new ExcelExport(User::class,$headings), 'users.xlsx');
    }

}
