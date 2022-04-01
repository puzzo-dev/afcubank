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
        <div class="col-md-12 mt-4 stretch-card transpatent">
            <div class="col-md-3 grid-margin text-light">
                <div class="card bg-primary">
                    <div class="card-body">
                        <p class="mb-4">No Of Registered Users</p>
                        <p class="h3 mb-4">{{ $data['users']->count() }}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card tale-bg">
                    <div class="card-body">
                        <p class="mb-4">No of Active Users</p>
                        <p class="h3 mb-4">{{ $data['user'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Active with verified KYC</p>
                        <p class="h3 mb-4">{{ $data['kyc'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Users that submitted KYC</p>
                        <p class="h3 mb-4">{{ $data['kycs'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data['users'] as $users)
                                <tr>
                                    <td><a href="{{ route('accusers.show',$users->id) }}">{{ $users->id }}</a></td>
                                    <td>{{ $users->f_name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->phone }}</td>
                                    <td><a class="text-primary" href="#">edit</a><hr><a class="text-danger" href="">delete</a></td>
                                    @empty
                                    <td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
