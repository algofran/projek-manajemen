<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('admin.panduan', compact('guides'));
    }

    public function detail($id)
    {
        $guide = Guide::findOrFail($id);
        return view('admin.panduan_detail', compact('guide'));
    }

    public function create()
    {
        return view('admin.panduan_add');
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

        return redirect()->route('show.guide');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => true, 'url' => $url]);
        }

        return response()->json(['uploaded' => false, 'message' => 'No file uploaded.'], 400);
    }

    public function removeImagesFromDescription($id)
    {
        $guide = Guide::findOrFail($id);

        // Cari tag <figure> dalam deskripsi
        $description = $guide->description;
        preg_match_all('/<figure[^>]*>(.*?)<\/figure>/is', $description, $matches);

        // Jika ada gambar dalam deskripsi
        if (!empty($matches[0])) {
            foreach ($matches[0] as $figureTag) {
                // Ambil nama file gambar dari atribut src dalam tag <img>
                preg_match('/src="(.*?)"/', $figureTag, $srcMatches);
                if (!empty($srcMatches[1])) {
                    $imageUrl = $srcMatches[1];
                    $imageName = basename($imageUrl);

                    // Hapus file gambar dari media storage
                    $imagePath = public_path('media/' . $imageName);
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // Hapus file dari direktori
                    }
                }
            }
        }

        // Hapus panduan dari database
        $guide->delete();

        return redirect()->back()
            ->with('success', 'Gambar dari deskripsi berhasil dihapus.');
    }
}
