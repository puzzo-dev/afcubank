<?php

namespace App\Http\Controllers;

use App\Traits\ImageUpload;
use App\Models\User;
use App\Models\kyc;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use Illuminate\Support\Facades\Auth;

class kycController extends Controller
{
    use ImageUpload;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userkyc = $user->kyc;
        $kycstatus = $userkyc->status ?? NULL;
        $class = NULL;

        // if($user->is_admin == 1)
        // {
        //     $kycs = kyc::all()->sortByDesc('updated_at');
        //     $kyc = CollectionHelper::paginate($kycs,5);
        //     return view('admin.kyc',['kyc'=>$kyc]);
        // }

        if(!empty($userkyc) && $kycstatus)
        {
            $kycstatus = 'Activated';
            $class = 'none';
        }
        if($userkyc == NULL)
        {
            $kycstatus = 'Not Activated';
            $class = 'block';
        }
        if(!empty($userkyc) && !$kycstatus)
        {
            $kycstatus = 'Under Review';
            $class = 'none';
        }
        if($user->is_admin == 1)
        {
        $users = user::all()->count();
        $kycs = kyc::all()->sortByDesc('updated_at');
        $ckycs = kyc::all()->count();
        $akycs = kyc::where('status',1)->count();
        $pkycs = $ckycs - $akycs;
        $nkycs = $users - $ckycs;
        $kyc = CollectionHelper::paginate($kycs,5);
        return
        view('admin.kyc',['nkycs'=>$nkycs,'pkycs'=>$pkycs,'akycs'=>$akycs,'ckycs'=>$ckycs,'user'=>$user,'kyc'=>$kyc,
        'kycstatus'=>$kycstatus]);
        }
        //dd($kycstatus);

        return view('users.kyc',['user'=>$user, 'userkyc'=>$userkyc, 'kycstatus'=>$kycstatus, 'class'=>$class]);
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
        //dd($request->input('id_proof'));
        $this->validate($request,[
        'id_proof' => ['required','image','mimes:jpeg,png,jpg,svg,gif','max:20000'],
        'address_proof' => ['required','image','mimes:jpeg,png,jpg,svg,gif','max:20000']
        ]);
        $kyc = new kyc;
        $kyc->user_id = Auth::user()->id;
        $kyc->id_proof = $request->id_proof;
        $kyc->address_proof = $request->address_proof;
        $kyc->status = 0;
        if($kyc->id_proof && $kyc->address_proof)
        {
            $kyc->id_proof = $this->UserImageUpload($kyc->id_proof); //Passing $query to our image upload trait
            $kyc->address_proof = $this->UserImageUpload($kyc->address_proof);
            $kyc->save();
            return redirect()->back()->with('success','KYC Documents Have been Accepted and under Review');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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
