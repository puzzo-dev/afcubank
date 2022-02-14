{{-- <style>
    #sidebar{
        position:fixed;
        padding-left:1%;
    }
</style> --}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    {{-- <div class="position-fixed"> --}}
        <ul class="nav flex-column">
          <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
                    <i class="icon-grid menu-icon"></i>
                    <span class ="menu-title">Account Summary</span>
               </a>
          </li>
          <li class="nav-item">
               <a href="{{ route('txns.index') }}" class="nav-link">
                    <i class="ti-exchange-vertical menu-icon"></i>
                    <span class ="menu-title">Make Transfers</span>
               </a>
          </li>
          <li class="nav-item">
               <a href="{{ route('beneficiaries.index') }}" class="nav-link">
                    <i class="ti-bookmark-alt menu-icon"></i>
                    <span class ="menu-title">Beneficiaries</span>
               </a>
          </li>
          <li disabled class="nav-item">
               <a href="#" disabled class="nav-link">
                    <i class="ti-user menu-icon"></i>
                    <span class ="menu-title">Loans</span>
               </a>
          </li>
          <li disabled class="nav-item">
               <a href="{{ route('kyc.index') }}" disabled class="nav-link">
                    <i class="ti-user menu-icon"></i>
                    <span class ="menu-title">KYC Update</span>
               </a>
          </li>
          <li class="nav-item">
               <a href="#" class="nav-link">
                    <i class="ti-email menu-icon"></i>
                    <span class ="menu-title">Get Help</span>
               </a>
          </li>
          <li class="nav-item">
               <a href="{{ route('accusers.edit',Auth::user()) }}" class="nav-link">
                    <i class="ti-settings menu-icon"></i>
                    <span class ="menu-title">Profile Settings</span>
               </a>
          </li>
        </ul>
    {{-- </div> --}}
</nav>
