@extends('layout')

@section('content')
    @include('partials._hero')
    @include('partials._search')
    @if (count($lists) == 0)
        <h2>No results Found</h2>
    @else
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($lists as $list)
                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <!-- Item 1 -->
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/no-image.png') }}" alt="" />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $list->id }}">{{ $list->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $list->company }}</div>
                            <ul class="flex">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $list->location }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
