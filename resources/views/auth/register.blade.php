@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="align-self-center">
                            <img class="mx-auto d-block m-5" src="{{ asset('images/pko-white-bg.svg') }}"
                                alt="logo" width="100px;"/>
                        </div>
                        <h1 class="text-center">Registration Form</h1>
                        <form method="POST" class="form" action="{{ route('register') }}">
                            @csrf
                            <!-- Progress bar -->
                            <div class="progressbar">
                                <div class="progress" id="progress"></div>
                                <div class="progress-step progress-step-active" data-title="Intro"></div>
                                <div class="progress-step" data-title="Auth"></div>
                                <div class="progress-step" data-title="Contact"></div>
                                <div class="progress-step" data-title="ID"></div>
                                <div class="progress-step" data-title="Password"></div>
                            </div>

                            <div class="form-step form-step-active">
                                <div class="row mt-3 mb-3">
                                    <label for="Full name">{{ __('Full Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="f_name" type="text"
                                            class="form-control @error('f_name') is-invalid @enderror" name="f_name"
                                            value="{{ old('f_name') }}" required autocomplete="f_name" autofocus>
                                        @error('f_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input id="l_name" type="text"
                                            class="form-control @error('l_name') is-invalid @enderror" name="l_name"
                                            value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>
                                        @error('l_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="btn-group col-md-6">
                                        <a href="#" class="btn btn-secondary btn-next">
                                            {{ __('Next') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-step">
                                <div class="row mb-3">
                                    <label for="Username">{{ __('Username') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('u_name') is-invalid @enderror"
                                            name="u_name" value="{{ old('u_name') }}" required autocomplete="u_name">
                                        @error('u_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone">{{ __('Phone Number') }}</label>
                                    <div class="col-md-12">
                                        <input type="phone" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="btn-group col-md-12">
                                        <a href="#" class="btn btn-secondary btn-prev">
                                            {{ __('Previous') }}
                                        </a>
                                        <a href="#" class="btn btn-secondary btn-next">
                                            {{ __('Next') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-step">
                                <div class="row mb-3">
                                    <label for="address">{{ __('Address') }}</label>
                                    <div class="col-md-12">
                                        <input class="form-control @error('addr1') is-invalid @enderror" type="text"
                                            name="addr1" id="addr1" value="{{ old('addr1') }}"
                                            placeholder="Address Line 1" />
                                        @error('addr1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address"></label>
                                    <div class="col-md-12">
                                        <input class="form-control @error('addr2') is-invalid @enderror" type="text"
                                            name="addr2" id="addr2" value="{{ old('addr2') }}"
                                            placeholder="Address Line 2" />
                                        @error('addr2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address"></label>
                                    <div class="col-md-6">
                                        <input class="form-control @error('city') is-invalid @enderror" type="text"
                                            name="city" value="{{ old('city') }}" id="city" placeholder="City" />
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control @error('state') is-invalid @enderror" type="text"
                                            name="state" id="state" value="{{ old('state') }}" placeholder="State" />
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address"></label>
                                    <div class="col-md-6">
                                        <input class="form-control @error('zipcode') is-invalid @enderror" type="text"
                                            name="zipcode" value="{{ old('zipcode') }}" id="zipcode"
                                            placeholder="zipcode" />
                                        @error('zipcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control @error('country') is-invalid @enderror" name="country"
                                            id="country">
                                            <option default value="country">Country</option>
                                            <option value="US">United States of America</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="IN">India</option>
                                            <option value="DE">Germany</option>
                                            <option value="AR">Argentina</option>
                                        </select>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="btn-group col-md-12">
                                        <a href="#" class="btn btn-secondary btn-prev">
                                            {{ __('Previous') }}
                                        </a>
                                        <a href="#" class="btn btn-secondary btn-next">
                                            {{ __('Next') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-step">
                                <div class="row mb-3">
                                    <label for="dob">{{ __('Date of Birth') }}</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                            name="dob" value="{{ old('dob') }}" required autocomplete="phone">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="govid">{{ __('Government Issued ID Number') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('govid') is-invalid @enderror"
                                            name="govid" value="{{ old('govid') }}" required autocomplete="govid">
                                        @error('govid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="btn-group col-md-12">
                                        <a href="#" class="btn btn-secondary btn-prev">
                                            {{ __('Previous') }}
                                        </a>
                                        <a href="#" class="btn btn-secondary btn-next">
                                            {{ __('Next') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-step">
                                <div class="row mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <div class="col-md-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="btn-group col-md-12">
                                        <a href="#" class="btn btn-secondary btn-prev">
                                            {{ __('Previous') }}
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center row mb-0">
                                <p>Have an Account ?<a href="{{ route('login') }}" class="btn btn-link">
                                        {{ __('Login Here') }}
                                    </a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
