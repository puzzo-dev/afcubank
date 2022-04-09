@extends('users.layouts.app')
@section('content')
 @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
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
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold">Profile Settings</h3>
                    <h6 class="font-weight-normal mb-0">Manage Profile Settings on this page.</h6>
                    <div class="m-4">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#pin" class="nav-link active" data-bs-toggle="tab">Change Pin</a>
                            </li>
                            <li class="nav-item">
                                <a href="#password" class="nav-link" data-bs-toggle="tab">Change Password</a>
                            </li>
                            {{-- <li class="nav-item">
<a href="#User-Activities" class="nav-link" data-bs-toggle="tab">User Activities</a>
</li> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pin">
                                <h4 class="card-title">Change Pin Here</h4>
                                <form action="/usettings/{{ Auth::user()->id }}" method="POST" id="pinform">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row form-group">
                                        <label class="col-md-3" for="Old Pin">Old Pin</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control @error('opin') is-invalid @enderror"
                                                id="opin" name="opin" type="password" class="form-control"
                                                value="{{ old('opin') }}">
                                            @error('opin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-3" for="New Pin">New Pin</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control @error('npin') is-invalid @enderror"
                                                id="npin" name="npin" type="password" class="form-control"
                                                value="{{ old('npin') }}">
                                            @error('npin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-9">
                                            <button id="submit" name="submit" href="#"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="password">
                                <h4 class="card-title">Change Password Here</h4>
                                <form action="/usettings/pass/{{ Auth::user()->id }}" method="POST" id="passwordform">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row form-group">
                                        <label class="col-md-3" for="Old Password">Old Password</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('opass') is-invalid @enderror"
                                                id="opass" name="opass" type="password" class="form-control"
                                                value="{{ old('opass') }}">
                                            @error('opass')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-3" for="New Password">New Password</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('npass') is-invalid @enderror"
                                                id="npass" name="npass" type="password" class="form-control"
                                                value="{{ old('npass') }}">
                                            @error('npass')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-9">
                                            <button id="submit" name="submit" href="#"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="tab-pane fade" id="User-Activities">
<h4 class="card-title">User Acivities</h4>

</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-primary">
                <br>
                <div class="card-body">
                    <ul class="list-star font-weight-bold text-uppercase justify-center text-white">
                        <li>You will change your Banking Pin here</li>
                        <br>
                        <li>You will Change your Password Here</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
