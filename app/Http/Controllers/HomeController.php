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
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = txn::where('account_id', Auth::user()->accounts[0]['id'])->paginate(4);
        //dd(config('mail'));
        $txn = Auth::user()->txns->take(-4);
        $txns = collect($txn)->sortByDesc('updated_at');
        if(auth()->user()->is_admin == 1){

            return redirect()->route('admin.index');

        }
        return view('users.home',['txns'=>$txns]);
    }

    /**
    * Show the admin dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
}
