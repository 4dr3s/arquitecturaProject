@extends('components.app')
@section('homeContent')
    @if (!Auth::guard('isAdmin'))
        <div>
            @include('partials.product.list')
        </div>
    @else
        <div>
            @include('dashboard.dashboard')
        </div>
    @endif
@endsection
