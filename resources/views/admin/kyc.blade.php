@extends('admin.layouts.app')
@section('content')
@forelse($kyc as $ky)
<p>{{ $ky }}</p>
@empty
<p>No KYC Added Yet</p>
@endforelse
{{ $kyc->links() }}
@endsection