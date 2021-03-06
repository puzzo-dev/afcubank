@extends('users.layouts.app')
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
                    <h4 class="card-title">Transfer Summary</h4>
                    <ul class="list-arrow font-weight-bold text-uppercase">
                        @forelse(Auth::user()->accounts as $account)
                            <li>Total Number of Transfer: {{ $sum_of_transaction }}</li>
                            <li>Total Incoming Funds: {{env('CURR_SIGN').$credit_sum }}</li>
                            <li>Total Outgoing Funds: {{env('CURR_SIGN').$debit_sum }}</li>
                            <li class="text-danger">Current Balance: {{ env('CURR_SIGN').number_format($account['bal'],2) }}</li>
                        @empty
                            <li>This User Doesn't Have an Account</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Transaction History</h3>
                    <h6 class="font-weight-normal mb-0">View all your transactions and account Usage Logs on this page</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Time Transaction History</h4>
                    <p class="card-desciption">View all your transactions here, you can also cancel or complete pending
                        transactions using the buttons beside each transaction</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>Receiver's Account</th> --}}
                                    <th>Transaction No</th>
                                    <th>Amount</th>
                                    <th>Transaction Date / Desc</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($txns as $txn)
                                    <tr class="grid-margin">
                                        @if ($txn->txn_flow == 'DEBIT')
                                            <td>
                                                <i class="ti-arrow-top-left menu-icon text-primary"></i>
                                            </td>
                                        @else
                                            <td>
                                                <i class="ti-arrow-top-right menu-icon text-danger"></i>
                                            </td>
                                        @endif

                                        {{-- <td>{{ $txn->r_accounts->r_acc_no ?? '[Beneficiary Deleted]'}}</td> --}}
                                        <td>{{ $txn->txn_no }}</td>
                                        <td>{{ env('CURR_SIGN').number_format($txn->txn_amount,2) }}</td>
                                        {{-- <td class="text-wrap">{{ $txn->txn_desc }}</td> --}}
                                        <td class="text-wrap">{{ $txn->txn_desc }} on
                                            {{ date('d-m-Y', strtotime($txn->created_at)) }}</td>
                                        @if ($txn->txn_type == 'Local Transfer')
                                            @if ($txn->txn_status == 'Completed')
                                                <td><label class="badge badge-success">{{ $txn->txn_status }}</label>
                                                </td>
                                            @elseif($txn->txn_status == 'Pending')
                                                <td><label class="badge badge-warning">{{ $txn->txn_status }}</label>
                                                </td>
                                            @else
                                                <td><label class="badge badge-danger">{{ $txn->txn_status }}</label></td>
                                            @endif
                                        @else
                                            @if ($txn->txn_status == 'Completed')
                                                <td><label class="badge badge-success">{{ $txn->txn_status }}</label>
                                                </td>
                                            @elseif($txn->txn_status == 'Pending')
                                                <td><label class="badge badge-warning">{{ $txn->txn_status }}</label>
                                                </td>
                                                <td><a class="text-primary" href="{{ route('txns.edit', $txn) }}">Finish</a><hr>
                                                    <a class="text-danger" href="{{ route('txns.update',  $txn) }}" onclick="event.preventDefault(); document.getElementById('update-form').submit();">Cancel</a>
                                                    <form id="update-form" action="{{ route('txns.update',  $txn) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                    </form>
                                                </td>
                                            @else
                                                <td><label class="badge badge-danger">{{ $txn->txn_status }}</label></td>
                                            @endif
                                        @endif
                                    @empty
                                        <td>No Transactions Available on this Account</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            {{ $txns->links() }}
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Make a Transfer</h4>
                    <p class="card-description">Initiate a Direct or Foreign Transfer from this form </p>
                    <form action="{{ route('txns.store') }}" class="forms-sample" id="transfer" Method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="acc_no">From Account</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('acc_no') is-invalid @enderror" name="acc_no" id="acc_no"
                                    value="{{ old('acc_no') }}">
                                    <option value="value=" {{ old('acc_no') }}"">Default</option>
                                    <option value="{{ Auth::user()->accounts[0]['acc_no'] }}">
                                        {{ Auth::user()->f_name }}
                                        {{ Auth::user()->l_name }} - {{ Auth::user()->accounts[0]['acc_no'] }}
                                    </option>
                                </select>
                                @error('acc_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="r_acc">Recipient Account</label>
                            <div class="col-sm-8">
                                <select class="form-control @error('r_acc') is-invalid @enderror" name="r_acc" id="r_acc"
                                    value="{{ old('r_acc') }}">
                                    <option value="{{ old('r_acc') }}">Default</option>
                                    @forelse(Auth::user()->r_accounts as $r_acc)
                                        <option value="{{ $r_acc->r_acc_no }}">
                                            {{ $r_acc->r_name }} - {{ $r_acc->bname }} - {{ $r_acc->r_acc_no }}
                                        @empty
                                        <option value="">You don't have any beneficiary added</option>
                                    @endforelse
                                </select>
                                @error('r_acc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="amt">Amount</label>
                            <div class="col-sm-1 accessibility-issue--errorform-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control @error('amt') is-invalid @enderror" name="amt"
                                    id="amt" value="{{ old('amt') }}" step="0.01">
                                @error('amt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Transfer Type">Transfer Type</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('txn_type') is-invalid @enderror" name="txn_type"
                                    id="txn_type" value="{{ old('txn_type') }}">
                                    <option value="{{ old('txn_type') }}">Default</option>
                                    <option value="International Transfer">International Transfer</option>
                                    <option value="Local Transfer">Local Transfer</option>
                                </select>
                                @error('txn_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="desc">Transfer Decription</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control @error('desc') is-invalid @enderror" name="desc"
                                    id="desc" value="{{ old('desc') }}" placeholder="Optional"></textarea>
                                @error('desc')
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
            <div class="card bg-primary">
                <div class="card-body">
                    <br>
                    <ul class="list-star font-weight-bold text-uppercase justify-center text-white">
                        <li>Make All Transfers on This Page</li>
                        <br>
                        <li>You need to add Beneficiaries Before you make Transfers</li>
                        <br>
                        <li>Your Account May not be able to make transfer without KYC Verification</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
