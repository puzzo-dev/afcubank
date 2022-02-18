@extends('admin.layouts.app')
@section('content')
@forelse($users as $user)
<p>{{ $user }}</p>
@empty
<p>No KYC Added Yet</p>
@endforelse
{{ $users->links() }}
@endsection