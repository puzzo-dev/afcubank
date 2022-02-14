@extends('users.layouts.app')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
               <div class="card-body mt-auto">
                    <h4 class="card-title">Account Information</h4>
                        <ul class="list-arrow font-weight-bold text-uppercase">
                           <li> <a href="/accusers/{{ $user->id }}"> Account Name: {{ $user->f_name }} {{ $user->l_name }}</li></a>
                           <li>Phone Number: {{ $user->phone }}</li>
                           <li>Email: {{ $user->email }}</li>
                           {{-- <li>Account Name: {{ $user->f_name }}</li> --}}
                        </ul>

               </div>
          </div>
     </div>

@endsection