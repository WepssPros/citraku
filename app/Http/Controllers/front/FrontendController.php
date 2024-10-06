<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PermasalahanUtama;
use App\Models\Rt;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Ambil semua blog dengan paginasi
        $blogs = Blog::paginate(3);

        // Hilangkan tag HTML dari konten setiap blog
        foreach ($blogs as $blog) {
            $blog->blog_content = strip_tags($blog->blog_content);
            $blog->header_name = strip_tags($blog->header_name);
        }

        return view('pages.frontend.index', compact('blogs'));
    }

    public function geopasial()
    {
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::with('kecamatan', 'permasalahan')->get();
        $permasalahans = PermasalahanUtama::all();
        $rts = Rt::with('kelurahan', 'kecamatan')->get();
        return view('pages.frontend.geopasial', compact('kecamatans', 'kelurahans', 'permasalahans', 'rts'));
    }

    public function blog()
    {
        return view('pages.frontend.blog');
    }

    public function blogdetails($slug)
    {
        // Ambil blog berdasarkan slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Kembalikan view dengan data blog
        return view('pages.frontend.blog', compact('blog'));
    }
}
