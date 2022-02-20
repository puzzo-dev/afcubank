<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\txn;
use App\Models\account;
use App\Models\kyc;
use App\Models\r_account;
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
        $bene = r_account::all()->count();
        $l4user = collect((user::all()->take(-4)))->sortByDesc('created_at');
        $l4credit = txn::where('txn_flow','CREDIT')->OrderBy('updated_at','desc')->get()->take(4);
        $l4debit = txn::where('txn_flow','DEBIT')->OrderBy('updated_at','desc')->get()->take(4);
        $l4bene = collect(r_account::all()->take(-4))->sortByDesc('created_at');
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
            'bene'=>$bene,
            'kycactive'=>$kycactive,
            'l4user'=>$l4user,
            'l4credit'=>$l4credit,
            'l4debit'=>$l4debit,
            'l4bene'=>$l4bene
        ];
        //dd($data['l4credit']);
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
