@extends('users.layouts.app')
@section('content')
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">International Transfer Tax Code</h4>
                    <p class="card-desc">If you do not have a Tax Code, Contact your Account manager for Information on
                        Tax Code to complete this
                        transaction</p>
                    <form action="{{ route('otp.update',$txn)}}" id="intltxn" id="otp" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="amt">Tax Code</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control @error('taxcode') is-invalid @enderror" name="taxcode"
                                    id="taxcode" value="{{ old('taxcode') }}" maxlength="6">
                                @error('taxcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-outline-primary mr-2" href="#">Complete</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Confirm your Transaction with Tax Code</h4>
<p class="card-desc">Contact your Account manager for Information on Tax Code to complete this transaction</p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
