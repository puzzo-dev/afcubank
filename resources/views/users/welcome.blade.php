@extends('users.layouts.app')
@section('content')
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
                    <h4 class="card-title">Account Information</h4>
                    <select class="form-control form-control-lg text-uppercase font-weight-bold" id="FormControlSelect1">
                        {{-- @forelse($user->accounts as $account) --}}
                        <option>{{ $account['acc_type'] ?? ''}}</option>
                        <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;{{ $account['acc_no'] ?? ''}}</option>
                        <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;{{ $user->f_name ?? ''}} {{ $user->l_name ?? ''}}</Option>
                        <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;${{ $account['bal'] ?? ''}}</Option>
                        {{-- @empty --}}
                        <option disabled style="font-style:italic">This User Doesn't Have an Account</Option>
                        {{-- @endforelse --}}
                    </select>
               </div>
          </div>
     </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Last 10 Transfer Activity</h4>
                <p class="card-desciption">Transaction History</p>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Account Number</th>
                          <th>Transaction Number</th>
                          <th>Transaction Type</th>
                          <th>Transaction Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>53275532</td>
                          <td>15 May 2017</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>

                        </tr>
                        <tr>
                          <td>John</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-info">Fixed</label></td>

                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-success">Completed</label></td>

                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>

            </div>
        </div>

    </div>
</div>
@endsection