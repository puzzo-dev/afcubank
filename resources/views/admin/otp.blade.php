@extends('admin.layouts.app')
@section('content')
@forelse($otp as $ot)
<p>{{ $ot }}</p>
@empty
<p>No OTP Transactions</p>
@endforelse
{{ $otp->links() }}
@endsection