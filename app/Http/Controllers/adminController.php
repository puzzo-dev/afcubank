<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\txn;
use App\Models\account;
use App\Models\kyc;
class adminController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
    $this->middleware(['auth','verified','is_admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
    * Show the admin dashboard.
    */
    public function index()
    {
        $users = user::all()->count();
        $kyc = kyc::all()->count();
        $kycactive = kyc::where('status',1)->count();
        $txn = txn::all()->count();
        $activeusers = account::where('active',1)->count();
        $ctxn = txn::where('txn_flow','CREDIT')->count();
        $dtxn = txn::where('txn_flow','DEBIT')->count();
        $tbal = account::all()->sum('bal');
        $abal = account::find(auth()->user()->accounts[0]['id'])->bal;
        $cbal = $tbal-$abal;
        $data = [
            'users'=>$users,
            'txn'=>$txn,
            'activeusers'=>$activeusers,
            'tbal'=>$tbal,
            'abal'=>$abal,
            'cbal'=>$cbal,
            'dtxn'=>$dtxn,
            'ctxn'=>$ctxn,
            'kyc'=>$kyc,
            'kycactive'=>$kycactive
        ];
        //dd($data);
        return view('admin.wel',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
