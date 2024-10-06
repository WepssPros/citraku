<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil semua data dari request
        $data = $request->all();

        // Generate slug dari header_name
        $data['slug'] = Str::slug($request->header_name);

        // Jika ada file thumbnail, simpan dan tambahkan ke data
        if ($request->hasFile('tumbnail')) {
            $data['tumbnail'] = $request->file('tumbnail')->store('tumbnail', 'public');
        }

        // Buat entry baru di tabel blogs
        Blog::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.blog.index')->with('success', 'Blog created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('pages.admin.blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil semua data dari request
        $data = $request->all();

        // Generate slug dari header_name
        $data['slug'] = Str::slug($request->header_name);

        // Temukan blog berdasarkan ID
        $blog = Blog::findOrFail($id);

        // Jika ada file thumbnail, simpan dan tambahkan ke data
        if ($request->hasFile('tumbnail')) {
            // Hapus thumbnail lama
            if ($blog->tumbnail) {
                Storage::disk('public')->delete($blog->tumbnail);
            }

            // Upload thumbnail baru
            $data['tumbnail'] = $request->file('tumbnail')->store('tumbnail', 'public');
        } else {
            // Jika tidak ada thumbnail baru, pertahankan thumbnail lama
            $data['tumbnail'] = $blog->tumbnail;
        }

        // Update entry di tabel blogs
        $blog->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.blog.index')->with('success', 'Blog updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan blog berdasarkan ID
        $blog = Blog::findOrFail($id);

        // Hapus thumbnail jika ada
        if ($blog->tumbnail) {
            Storage::disk('public')->delete($blog->tumbnail);
        }

        // Hapus entry di tabel blogs
        $blog->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.blog.index')->with('success', 'Blog deleted successfully.');
    }
}
