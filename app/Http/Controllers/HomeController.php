<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Membuat instance controller baru.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan dashboard aplikasi.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Paginator::useBootstrap();

        $pasiens = Pasien::paginate(5);

        return view('home', compact('pasiens'));
    }

    public function cari(Request $request)
    {
        $cari = $request->input('cari');

        $pasiens = Pasien::where('nama', 'like', "%$cari%")
            ->orWhere('penyakit', 'like', "%$cari%")
            ->paginate(5);

        return view('home', compact('pasiens'));
    }

    public function processDropdown(Request $request)
    {
        $pasiens = Pasien::all();

    // Lakukan proses lain sesuai kebutuhan, contohnya bisa memformat data atau melakukan validasi

    // Redirect kembali dengan menyertakan data pasien
    return redirect()->back()->with('pasiens', $pasiens)->with('success', 'Proses dropdown berhasil dilakukan.');
    }
}