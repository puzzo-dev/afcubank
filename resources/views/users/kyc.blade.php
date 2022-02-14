@extends('users.layouts.app')
@section('content')
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
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
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <h4 class="card-title">User Information</h4>
                    <ul class="list-arrow font-weight-bold text-uppercase">
                        <li>Account Name: {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</li>
                        <li>Phone Number: {{ Auth::user()->phone }}</li>
                        <li>Email: {{ Auth::user()->email }}</li>
                        {{-- <li>Account Name: {{ $user->f_name }}</li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <h4 class="card-title">KYC Summary</h4>
                    <ul class="list-arrow font-weight-bold text-uppercase">
                        {{-- @forelse(Auth::user()->kyc as $account) --}}
                        <li>KYC Status: {{ $kycstatus }}</li>
                        <li>ID Number: {{ $user->govid }}</li>
                        @if ($kycstatus == 'Not Activated')
                            <li class="text-danger">Submit your KYC Details Using the Form Below</li>
                        @else
                            <li class="text-warning">Kyc has been accepted and is Under Review</li>
                        @endif
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">KYC Activation</h4>
                    <p class="card-description">Activate Your KYC on this page</p>
                    @if ($kycstatus == 'Not Activated')
                        <li class="text-danger">Submit your KYC Details Using the Form Below</li>
                    @else
                        <li class="text-warning">Kyc has been accepted and is Under Review</li>
                    @endif
                    <form action="{{ route('kyc.store') }}" class="forms-sample" style="display:{{ $class }}"
                        id="transfer" Method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="id_proof">Government Issued Id</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('id_proof') is-invalid @enderror"
                                    name="id_proof" id="id_proof" value="{{ old('id_proof') }}">
                                @error('id_proof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="address_proof">Address Proof</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('address_proof') is-invalid @enderror"
                                    name="address_proof" id="address_proof" value="{{ old('address_proof') }}">
                                @error('address_proof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-outline-primary mr-2" href="#">Transfer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
