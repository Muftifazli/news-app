@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-center mb-6">Radar Jabodetabek</h1>

    <div class="bg-gray-50 rounded-2xl shadow p-6">
        <h2 class="text-2xl font-bold mb-2">{{ $news->judul }}</h2>
        <p class="text-sm text-gray-600 mb-2">Oleh {{ $news->wartawan->nama }}</p>
        <p class="text-gray-700 mb-4">{{ $news->isi }}</p>

        <hr class="my-4">

        {{-- 🔹 Form Tambah Komentar --}}
        <h3 class="text-xl font-semibold mb-3">Tambah Komentar</h3>
        <form action="{{ route('news.comments.store', $news->id) }}" method="POST" class="mb-6">
            @csrf
            <input 
                type="text" 
                name="nama" 
                placeholder="Nama Anda" 
                class="border rounded w-full p-2 mb-2" 
                required
            >

            <textarea 
                name="isi" 
                placeholder="Tulis komentar..." 
                class="border rounded w-full p-2" 
                rows="3"
                required
            ></textarea>

            <button 
                type="submit" 
                class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Kirim Komentar
            </button>
        </form>

        {{-- 🔹 Tabel Komentar --}}
        <h3 class="text-xl font-semibold mb-3">Komentar</h3>
        <table class="w-full border text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2">Nama</th>
                    <th class="border px-3 py-2">Komentar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news->komentar as $komen)
                    <tr>
                        <td class="border px-3 py-2">{{ $komen->nama }}</td>
                        <td class="border px-3 py-2">{{ $komen->isi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-500 py-3">Belum ada komentar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="text-center text-gray-600 mt-6 text-lg">Detail Page</p>
</div>
@endsection
