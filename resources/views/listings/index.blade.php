<x-layout>
    @include('partials._hero')
    @include('partials._search')
    @if (count($lists) == 0)
        <h2>No results Found</h2>
    @else
        @if (request()->has('search'))
            <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
            </a>
        @endif
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($lists as $list)
                <x-listing-card :list="$list" />
            @endforeach
        </div>
    @endif

</x-layout>
