@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="showcase">
        <div class="container">
            <nav class="navbar">
                <ul>
                    <li><a href="#">Individual Clients</a></li>
                    <li><a href="#">Private Banking</a></li>
                    <li><a href="#">Companies</a></li>
                    <li><a href="#">Enterprises</a></li>
                    <li><a href="#">Corporations and local governments</a></li>
                    <li><a href="#">International Banking</a><i class="flag-icon-background flag-icon-uk"></i></li>
                </ul>
                <div class="nav-btns">
                    <a class="btn-search" href="#">Search</a>
                    <a class="btn-primary" href="#">Take a Loan</a>
                    <a class="btn-secondary" href="#">Open an Account</a>
                    <a class="" href="#">Log in</a>
                </div>
            </nav>
            <nav class="btm-nav">
                <ul>
                    <li><a href="#">Accounts</a></li>
                    <li><a href="#">Cards</a></li>
                    <li><a href="#">Loan</a></li>
                    <li><a href="#">Insurance</a></li>
                    <li><a href="#">Mortgages</a></li>
                    <li><a href="#">Automarket</a></li>
                    <li><a href="#">Investments</a></li>
                    <li><a href="#">Personal Banking</a></li>
                    <li><a href="#">e-Office</a></li>
                    <li><a href="#">Limity w koncie</a></li>
                </ul>
            </nav>
            <div class="showcase-content">
                <div>
                    <h1>PKO KONTO ZA ZERO HAS WHAT YOU NEED</h1>
                    <p class="my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et laudantium
                        voluptas suscipit nulla, voluptatem labore natus nemo exercitationem quis repudiandae quam quia
                        numquam, doloremque architecto quisquam ullam deserunt cum. Magni?</p>
                </div>
                <img src="{{ asset('images/pko-white-bg.svg') }}" alt="banner-img" class="banner-img">
                <img align-self="top" src="{{ asset('images/pko-white-bg.svg') }}" alt="logo" class="logo">
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row col 12">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <hr>
            <div class="row">
                <div class="row col-12">
                    <div class="col-12 col-xl-8 mb-xl-0">
                        <h2>News</h2>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <a href="#">See More</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div>

                    </div>
                    <div>

                    </div>
                    <div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row col-12">
                <div class="row col-12 mb-5">
                    <h2>Account and finance service via the Internet 24h/7</h2>
                </div>
                <div class="row col-12 article-2">
                    <div class="col-sm-12 col-md-6">
                        <img src="{{ asset('images/pko2.png') }}" alt="web_logo">
                        <h3>iPKO website</h3>
                        <p>Access to finances at PKO Bank Polski straight from your computer's browser</p>
                        <a href="#" class="btn-primary">Get to Know iPKO</a>
                        <a href="#" class="btn-accent">How do I get access</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <img src="{{ asset('images/pko1.png') }}" alt="app_logo">
                        <h3>IKO mobile app</h3>
                        <p>Account on your phone - download and activate the best app in the world (Retail Bankier
                            International, February 2019)</p>
                        <a href="#" class="btn-primary">Explore the IKO app</a>
                        <a href="#" class="btn-accent">Order the app via sms</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row col-12 justify-content-lg-center">
                <h3>Secure Bank</h3>
                <p>Check out how to keep your finances safe. <a href="#">More about online security</a></p>
            </div>
            <hr>

        </div>
    </div>
@endsection
