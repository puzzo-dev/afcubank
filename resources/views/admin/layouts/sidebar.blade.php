<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar flex-column position-fixed">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="ti-dashboard menu-icon"></i>
              <span class="menu-title">Banking Metrics</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">User Operations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('accusers.index') }}">View All Users</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('account.index') }}">View All Accounts</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="ti-exchange-vertical menu-icon"></i>
              <span class="menu-title text-wrap">Transaction Operations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item text-wrap"><a class="nav-link text-wrap" href="{{ route('txns.index') }}">View All Transactions</a></li>
                <li class="nav-item text-wrap"><a class="nav-link text-wrap" href="{{ route('otp.index') }}">View All OTP Transactions</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="ti-rocket menu-icon"></i>
              <span class="menu-title">Loans</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Create Loans</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">View Loans</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">User Loans</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('beneficiaries.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">All Beneficiaries</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="ti-envelope menu-icon"></i>
              <span class="menu-title">Notifications</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{ route('notifications.index') }}">View Notifications</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="#">Create Notifications </a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="#">User Notifications </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('kyc.index') }}">
              <i class="ti-id-badge menu-icon"></i>
              <span class="menu-title">KYC</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index')}}">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Master Settings</span>
            </a>
          </li>
        </ul>
    </div>
      </nav>