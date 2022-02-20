@extends('admin.layouts.app')
@section('content')
@if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="mb-4">Users with KYC Submitted</p>
                <p class="fs-30 mb-4">{{ $data['kyc'] }}</p>
                <p class="mb-4">Users with KYC Activated</p>
                <p class="fs-30 mb-4">{{ $data['kycactive'] }}</p>
                <p class="mb-4">Number of Active Accounts</p>
                <p class="fs-30 mb-4">{{ $data['activeusers'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
        <div class="row">
            <div class="col-md-6 stretch-card mb-4 transparent">
                <div class="card tale-bg">
                    <div class="card-body">
                        <p class="mb-4">No of Registered User</p>
                       <p class="fs-30 mb-2">{{ $data['users'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card mb-4 transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">No of Credit Transaction</p>
                        <p class="fs-30 mb-2">{{ $data['ctxn'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 stretch-card mb-lg-0 transparent">
                <div class="card bg-primary text-light">
                    <div class="card-body">
                        <p class="mb-4">No Of Activated users</p>
                        <p class="fs-30 mb-2">{{ $data['activeusers'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">No of Debit Transaction</p>
                        <p class="fs-30 mb-2">{{ $data['dtxn'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="mb-2">Total Customers Balance</p>
                <p class="fs-30 mb-4">{{ number_format($data['cbal'],2) }}</p>
                <p class="mb-2">Admin Balance</p>
                <p class="fs-30 mb-4">{{ number_format($data['abal'],2) }}</p>
                <p class="mb-2">Total Bank Balance</p>
                <p class="fs-30 mb-4">{{ number_format($data['tbal'],2) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection