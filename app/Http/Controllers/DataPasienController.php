<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class DataPasienController extends Controller
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

        return view('datapasien', compact('pasiens'));
    }

    public function cari(Request $request)
    {
        $cari = $request->input('cari');

        $pasiens = Pasien::where('nama', 'like', "%$cari%")
            ->orWhere('penyakit', 'like', "%$cari%")
            ->paginate(5);

        return view('datapasien', compact('pasiens'));
    }

    public function getPatientDetail($id)
    {
        $pasiens = DB::table('pasien')->where('id', $id)->first();

        if ($pasiens) {
            return response()->json($pasiens);
        }
        return response()->json([], 404);
    }
}
