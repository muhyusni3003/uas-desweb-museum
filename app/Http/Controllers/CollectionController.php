<?php

namespace App\Http\Controllers;

use App\Models\Collection;


class CollectionController extends Controller
{
    // Menampilkan daftar koleksi
    public function index()
    {
        $collections = Collection::all();
        return view('collections.index', compact('collections'));
    }
    public function show($id)
    {
        $collection = Collection::findOrFail($id);
        return view('collections.show', compact('collection'));
    }
}
