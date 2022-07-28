@extends('users.layouts.app')
@section('content')
@if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
<div class="row">
<div class="col-md-12 grid-margin">
     <div class="row">
          <div class="col-12 col-xl-6 mb-3 mb-xl-0">
          <h4 class="font-weight-bold">Welcome {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h4>
          <h6 class="font-weight-normal mb-0">Last Login Date: {{ now(); }}</h6>
          </div>
     </div>

</div>
</div>
<div class="row">
     <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-primary tale-bg">
               <div class="card-body mt-auto">
                    <h4 class="card-title text-light">User Information</h4>
                        <ul class="list-star font-weight-bold text-uppercase text-light">
                           <li>Account Name: {{ Auth::user()->f_name  }} {{ Auth::user()->l_name }}</li>
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
                    <h4 class="card-title">Account Information</h4>
                    <ul class="list-arrow font-weight-bold text-uppercase">
                        @forelse(Auth::user()->accounts as $account)
                        <li>Account Type: {{ $account['acc_type'] ?? ''}}</li>
                        <li>Account No: {{ $account['acc_no']}}</li>
                        <li>Account Name: {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</li>
                        <li class="text-danger">Account Balance:  {{ env('CURR_SIGN').number_format($account['bal'],2)}}</li>
                        @empty
                        <li>This User Doesn't Have an Account</li>
                        @endforelse
                    </ul>
               </div>
          </div>
     </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Last 4 Transfer Activity</h4>
                <p class="card-desciption">Transaction History</p>
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
                                        @if($txn->txn_flow == "DEBIT")
                                        <td>
                                            <i class="ti-arrow-top-left menu-icon text-danger"></i>
                                        </td>
                                        @else
                                        <td>
                                            <i class="ti-arrow-top-right menu-icon text-primary"></i>
                                        </td>
                                        @endif
                                        {{-- <td>{{ $txn->r_accounts->r_acc_no ?? 'Beneficiary Deleted'}}</td> --}}
                                        <td>{{ $txn->txn_no }}</td>
                                        <td> {{ env('CURR_SIGN').number_format($txn->txn_amount,2) }}</td>
                                        {{-- <td class="text-wrap">{{ $txn->txn_desc }}</td> --}}
                                        <td class="text-wrap">{{ $txn->txn_desc }} on {{ date('d-m-Y', strtotime($txn->created_at)) }}</td>
                                        @if ($txn->txn_type == 'Local Transfer')
                                        @if($txn->txn_status == 'Completed')
                                            <td><label class="badge badge-success">{{ $txn->txn_status }}</label></td>
                                        @elseif($txn->txn_status == 'Pending')
                                            <td><label class="badge badge-warning">{{ $txn->txn_status }}</label></td>
                                            @else
                                            <td><label class="badge badge-danger">{{ $txn->txn_status }}</label></td>
                                        @endif
                                        @else
                                        @if ($txn->txn_status == 'Completed')
                                            <td><label class="badge badge-success">{{ $txn->txn_status }}</label></td>
                                        @elseif($txn->txn_status == 'Pending')
                                            <td><label class="badge badge-warning">{{ $txn->txn_status }}</label></td>
                                            <td><a class="text-primary" href="{{ route('txns.edit',$txn)}}">finish</a> <br><br><a class="text-danger" href="#">cancel</a></td>
                                             @else
                                            <td><label class="badge badge-danger">{{ $txn->txn_status }}</label></td>
                                        @endif
                                        @endif
                                    @empty
                                        <td>No Transactions Available on this Account</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            {{-- {{ $txns->links() }} --}}
                        </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection