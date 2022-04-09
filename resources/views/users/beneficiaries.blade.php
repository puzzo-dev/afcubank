@extends('users.layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('failure'))
        <div class="alert alert-danger">{{ session('failure') }}</div>
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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beneficiaries</h4>
                    <p class="card-desciption">Manage your added beneficiaries on this page</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Account Number</th>
                                    <th>Account Name</th>
                                    <th>Bank name</th>
                                    <th>Swiftcode /<br>
                                        Branch No /<br>
                                        Sortcode</th>
                                    <th>Remarks</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($user as $txn)
                                    <tr>
                                        <td>{{ $txn->r_acc_no }}</td>
                                        <td>{{ $txn->r_name }}</td>
                                        <td>{{ $txn->bname }}</td>
                                        <td>{{ $txn->swiftcode }}</td>
                                        <td>{{ $txn->remarks }}</td>
                                        <td><a class="text-danger" href="{{ route('beneficiaries.destroy',  $txn) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
                                                    <form id="delete-form" action="{{ route('beneficiaries.destroy',  $txn) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form></td>
                                    @empty
                                        <td>No Beneficiaries has been added to this Account</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            {{ $user->links() }}
                        </table>
                    </div>

                </div>
            </div>

        </div>
            <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add a Recipient Bank Account</h4>
                    <p class="card-description">Add a recipient bank Account to make a Direct or Foreign Transfer </p>
                    <form action="{{ route('beneficiaries.store') }}" class="forms-sample" id="beneficiary"
                        Method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="r_name">Recipient Account Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('r_name') is-invalid @enderror" name="r_name"
                                    id="r_name" value="{{ old('r_name') }}">
                                @error('r_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="r_acc">Recipient Account Number</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('r_acc') is-invalid @enderror" name="r_acc"
                                    id="r_acc" value="{{ old('r_acc') }}">
                                @error('r_acc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="bname">Bank Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('bname') is-invalid @enderror" name="bname"
                                    id="bname" value="{{ old('bname') }}">
                                @error('bname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="scode">Branch / Swift Code</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('scode') is-invalid @enderror" name="scode"
                                    id="scode" value="{{ old('scode') }}">
                                @error('scode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="remarks">Remarks</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('remarks') is-invalid @enderror"
                                    name="remarks" id="remarks" value="{{ old('remarks') }}"></textarea>
                                @error('remarks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-outline-primary mr-2" href="#">Add Account</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-primary">
                <div class="card-body">
                    <br>
                    <br>
                    <ul class="list-star font-weight-bold text-uppercase justify-center text-white">
                        <li>You will add and Remove beneficiaries for Transfer Here </li>
                        <br>
                        <li>You will view and Manage all Beneficiaries on this Page</li>
                        <br>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
