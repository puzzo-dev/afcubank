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
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <p class="mb-4">No Of KYC Submitted</p>
                    <p class="fs-30 mb-4">{{ $ckycs }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <p class="mb-4">No Of KYC Approved</p>
                    <p class="fs-30 mb-4">{{ $akycs }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <p class="mb-4">No Of KYC Pending</p>
                    <p class="fs-30 mb-4">{{ $pkycs }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body mt-auto">
                    <p class="mb-4">No Of User not Submitted</p>
                    <p class="fs-30 mb-4">{{ $nkycs }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Proof</th>
                                <th>Address Proof</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kyc as $ky)
                                <tr>
                                    <td>{{ $ky->id }}</td>
                                    <td><a href="{{ asset($ky->id_proof) }}">View</a></td>
                                    <td><a href="{{ asset($ky->address_proof) }}">View</a></td></td>
                                    <td>{{ $ky->status }}</td>
                                    <td><a class="text-primary" href="#">approve</a><hr><a class="text-danger" href="">reject</a></td>
                                @empty
                                <td>Empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-primary">
                <div class="card-body">
                    <ul class="text-light">
                        <li>View Users Kyc Here</li>
                        <li>Approve or Reject User KYC Here</li>
                        {{-- <li></li>
                        <li></li> --}}
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
