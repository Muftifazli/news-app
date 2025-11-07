@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-center mb-6">📰 Radar Jabotabek</h1>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach ($news as $item)
            <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-gray-800">
                    <a href="{{ route('news.show', $item->id) }}">{{ $item->judul }}</a>
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Oleh <strong>{{ $item->wartawan->nama }}</strong>
                </p>
                <p class="text-gray-700 mt-2">{{ $item->ringkasan }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $news->links() }}
    </div>
</div>
@endsection
