@extends('layout')

@section('content')
    @include('partials._hero')
    @include('partials._search')
    @if (count($lists) == 0)
        <h2>No results Found</h2>
    @else
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($lists as $list)
                <x-listing-card :list="$list" />
            @endforeach
        </div>
    @endif
@endsection
