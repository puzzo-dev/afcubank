<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href={{ asset("css/extra.css") }} />
    <title>Registraion Form</title>
  </head>
  <body>
    <form action="{{ route('register') }}" class="form" METHOD="POST">
        @csrf
        <div class="brand-logo">
                <img src={{ asset("storage/images/Alaska_USA_logo.png") }} alt="logo">
              </div>
      <h1 class="text-center">Registration Form</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Intro"></div>
        <div class="progress-step" data-title="Auth"></div>
        <div class="progress-step" data-title="Contact"></div>
        <div class="progress-step" data-title="ID"></div>
        <div class="progress-step" data-title="Password"></div>
      </div>
      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group">
          <label for="First Name">First Name</label>
          <input type="text" name="f_name" id="f_name" value="{{ old('f_name') }}" placeholder="First name" />
          <span class="text-danger">@error('f_name'){{ $message }}@enderror</span>
        </div>
        <div class="input-group">
          <label for="Last Name">Last Name</label>
          <input type="text" name="l_name" id="l_name" value="{{ old('l_name') }}" placeholder="Last name" />
          <span class="text-danger">@error('l_name'){{ $message }}@enderror</span>
        </div>
        <div class="">
          <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" name="u_name" id="u_name" value="{{ old('u_name') }}" placeholder="Username"/>
          <span class="text-danger">@error('u_name'){{ $message }}@enderror</span>
        </div>
        <div class="input-group">
          <label for="Email">Email</label>
          <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email"/>
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label for="address">Address</label>
          <input class="addr" type="text" name="addr1" id="addr1" value="{{ old('addr1') }}" placeholder="Address Line 1"/>
          <span class="text-danger">@error('addr1'){{ $message }}@enderror</span>
          <input class="addr" type="text" name="addr2" id="addr2" value="{{ old('addr2') }}" placeholder="Address Line 2"/>
          <span class="text-danger">@error('addr2'){{ $message }}@enderror</span>
          <input class="width-49" type="text" name="city" value="{{ old('city') }}" id="city" placeholder="City"/>
          <input class="width-49" type="text" name="state" id="state" value="{{ old('state') }}" placeholder="State"/>
          <span class="text-danger">@error('city'){{ $message }}@enderror</span></br>
          <span class="text-danger">@error('state'){{ $message }}@enderror</span>
          <input class="addr width-49" type="text" name="zipcode" value="{{ old('zipcode') }}" id="zipcode" placeholder="zipcode"/>
          <select class="width-49" name="country" id="country">
            <option default value="country">Country</option>
            <option value="US">United States of America</option>
            <option value="GB">United Kingdom</option>
            <option value="IN">India</option>
            <option value="DE">Germany</option>
            <option value="AR">Argentina</option>
            </select>
            <span class="text-danger">@error('zipcode'){{ $message }}@enderror</span>
            <span class="text-danger">@error('country'){{ $message }}@enderror</span>
        </div>
        <div class="input-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone"/>
          <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label for="dob">Date of Birth</label>
          <input type="date" name="dob" id="dob" value="{{ old('dob') }}" placeholder="Date of Birth"/>
          <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
        </div>
        <div class="input-group">
          <label for="ID">National ID</label>
          <input type="number" name="govid" id="govid" value="{{ old('govid') }}" placeholder="Gov't Issued Id"/>
          <span class="text-danger">@error('govid'){{ $message }}@enderror</span>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password"/>
          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="input-group">
          <label for="confirm Password">Confirm Password</label>
          <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="Confirm Password"
            value="{{ old('password_confirmation') }}"
          /><span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
        </div>
        <div class="mt-4 btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" value="Submit" class="btn" />
        </div>
      </div>
      <div class="text-center mt-4 font-weight-light">
         Already have an account? <a href={{ route("login") }} class="text-primary">Login</a>
    </div>
    </form>
  </body>
  <script src={{ asset("js/script.js") }} defer></script>
</html>
