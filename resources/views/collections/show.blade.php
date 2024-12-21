@extends('layout.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Gambar Lukisan -->
        <div class="bg-gray-200 h-96 flex items-center justify-center">
            <img src="{{ Storage::url($collection->image) }}" class="w-full h-full object-cover" alt="{{ $collection->name }}">
        </div>

        <div class="p-6">
            <h2 class="text-4xl font-semibold text-gray-800">{{ $collection->name }}</h2>
            <p class="text-gray-600 mb-2">By: {{ $collection->nama_pelukis }}</p>
            <p class="text-gray-500 text-sm mb-4">{{ $collection->description }}</p>

            <div class="flex justify-between text-sm text-gray-500">
                <span>Tahun: {{ $collection->year }}</span>
                <span>Status: {{ $collection->status }}</span>
            </div>

            <div class="flex justify-between text-sm text-gray-500 mt-2">
                <span>Tipe: {{ $collection->tipe_lukisan }}</span>
                <span>Kondisi: {{ $collection->condition }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
