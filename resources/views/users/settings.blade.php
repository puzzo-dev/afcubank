@extends('users.layouts.app')
@section('content')
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
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card grid-margin ">
                <div class="card-body">
                    <h3 class="font-weight-bold">Profile Settings</h3>
                    <h6 class="font-weight-normal mb-0">Change Profile Settings on this page.</h6>
                    <div class="m-4">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#pin" class="nav-link active" data-bs-toggle="tab">Change Pin</a>
                            </li>
                            <li class="nav-item">
                                <a href="#password" class="nav-link" data-bs-toggle="tab">Chaneg Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pin">
                                <h4 class="mr-2">Change Pin Here</h4>
                                <form action="{{ route('accusers.update', Auth::user()->id) }}" medthod="POST" id="pinform">
                                    @csrf
                                    <div class="row form-group">
                                        <label class="col-md-3" for="Old Pin">Old Pin</label>
                                        <div class="col-md-9">
                                            <input type="text" id="opin" name="opin" type="password" class="form-control" value="{{ old('opin') }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-3" for="New Pin">New Pin</label>
                                        <div class="col-md-9">
                                            <input type="text" id="npin" name="npin" type="password" class="form-control" value="{{ old('npin') }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-9">
                                            <button id="submit" name="submit" href="#" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="password">
                                <h4 class="mt-2">Change Password Here</h4>
                                <form action="#" medthod="POST" id="passwordform">
                                    @csrf
                                    <div class="row form-group">
                                        <label class="col-md-3" for="Old Password">Old Password</label>
                                        <div class="col-md-9">
                                            <input type="text" id="opass" name="opass" type="password" class="form-control"value="{{ old('opass') }}">

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-3" for="New Password">New Password</label>
                                        <div class="col-md-9">
                                            <input type="text" id="npass" name="npass" type="password" class="form-control"value="{{ old('npass') }}">

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-9">
                                            <button id="submit" name="submit" href="#" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card grid-margin">
                <div class="card-body">


                </div>
            </div>
        </div>
    </div>

@endsection
