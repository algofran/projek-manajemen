<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('informasi.index', compact('guides'));
    }

    public function detail($id)
    {
        $guide = Guide::findOrFail($id);
        return view('informasi.detail', compact('guide'));
    }

    public function create()
    {
        return view('informasi.create');
    }
    public function edit($id)
    {
        $guide = Guide::findOrFail($id);
        return view('informasi.edit', compact('guide'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();
        $guide = new Guide;
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->user = $user->username;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image);
            $base64Image = base64_encode($imageData);
            $guide->image = $base64Image;
        } else {
            $guide->image = null;
        }

        $guide->save();

        return redirect()->route('informasi');
    }

    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);
        $guide->title = $request->input('title');
        $guide->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileData = file_get_contents($file);
            $base64 = base64_encode($fileData);
            $guide->image = $base64;
        }

        $guide->save();

        return redirect()->route('informasi')->with('success', 'Informasi updated successfully.');
    }

    public function destroy(string $id)
    {
        $penjualan = Guide::findOrFail($id);

        $penjualan->delete();

        return redirect()->route('informasi')->with('success', 'Information deleted successfully!');
    }
}
