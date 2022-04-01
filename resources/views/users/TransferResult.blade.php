@extends('users.layouts.app')
@section('content')
<div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-3 mb-xl-0">
                    <h4 class="font-weight-bold">Welcome {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h4>
                    <h6 class="font-weight-normal mb-0">Last Login Date: {{ now() }}</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today {{ date('d-m-Y') }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <h4 class="card-title text-success">Your {{ $txninfo->txn_type }} is {{ $txninfo->txn_status }}</h4>
                    <p class="card-description">{{ $txninfo->txn_type }} for the sum of ${{ $txninfo->txn_amount }} has been {{ $txninfo->txn_status }}, please find the details below</p>
                    <div class="col-sm-8">
                        <h6>Transaction Number: {{ $txninfo->txn_no }}</h6>
                        <h6>Receiver's Name: {{ $txninfo->r_accounts->r_name }}</h6>
                        <h6>Receiver's Account: {{ $txninfo->r_accounts->r_acc_no }}</p></h6>
                        <h6>Amount Sent: {{ $txninfo->txn_amount }}</h6>
                        <h6>Date Sent: {{ $txninfo->created_at }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body mt-aut0">

                </div>
            </div>
        </div>
    </div>
@endsection