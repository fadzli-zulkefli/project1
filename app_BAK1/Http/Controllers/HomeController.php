<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogSemakan;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log_semakan = // LogSemakan::all();
            DB::table('log_semakan')
            ->leftJoin('permohonan', 'log_semakan.no_ic', '=', 'permohonan.no_ic')

            ->select('log_semakan.*', 'permohonan.name')
            ->get();


        return view('home')->with(compact('log_semakan'));
    }

    public function get_file($file_path)
    {
        return response()->file(storage_path("app/upload/" . $file_path));
    }
}
