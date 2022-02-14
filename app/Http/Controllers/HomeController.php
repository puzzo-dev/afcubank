<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = txn::where('account_id', Auth::user()->accounts[0]['id'])->paginate(4);
        $txn = Auth::user()->txns->take(-4);
        $txns = collect($txn)->sortByDesc('id');
        return view('home',['txns'=>$txns]);
    }
}
