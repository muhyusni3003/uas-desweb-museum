@extends('layout.app')
@section('content')
<div class="h-[112px]">
    <x-nav/>
</div>
	<div class="container">
		

<div class="container mx-auto py-8 px-4">
    <h1 class="text-4xl font-semibold text-center mb-8" style="color: white">Koleksi Lukisan</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($collections as $collection)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl duration-300">

            <br>
		<br>
		<div class="row">
				<div class="col-1">
					<div class="card">
                        <img src="{{ Storage::url($collection->image) }}" style="width:100%" class="w-full h-full object-cover transform transition-all hover:scale-110" alt="{{ $collection->name }}">

					  <div class="containers">
					    <h5>{{ $collection->name }}</h5>
                        <h5>{{ $collection->nama_pelukis }}</h5>
					    <p>{{ Str::words($collection->description, 10) }}...</p>
					    <br>
                        <div class="flex justify-between" style="color: white">
                            <span>Tahun: {{ $collection->year }}</span>
                            <span>Status: {{ $collection->status }}</span>
                        </div>

                        <div class="flex justify-between mt-2" style="color: white">
                            <span>Tipe: {{ $collection->tipe_lukisan }}</span>
                            <span>Kondisi: {{ $collection->condition }}</span>
                        </div>
                        <br>
					    <button type="button"><b>Read More</b></button>
					    <br>
					    <br>
					  </div>
					</div>
				</div>
		</div>
		<br>
		<br>
        </div>
        @endforeach
    </div>
</div>


		</div>

