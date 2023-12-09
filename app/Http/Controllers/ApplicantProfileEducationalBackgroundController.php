<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantProfileEducationalBackgroundRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantEducationalBackground;

class ApplicantProfileEducationalBackgroundController extends Controller
{
    public function index()
    {
        $applicant = Auth::user();
        return view('applicant.profile.educational-background.index', [
            'title' => 'Riwayat Pendidikan',
            'active' => 'active',
            "profile" => $applicant->name,
            "applicant_id" => $applicant->id,
            "applicant" => $applicant,
        ]);
    }

    // public function create()
    // {
    //     $applicant = Auth::user();
    //     return view(
    //         'applicant.educational-background.create',
    //         [
    //             'title' => 'Ajukan Lamaran | Riwayat Pendidikan',
    //             'active' => 'active',
    //             "applicant_id" => $applicant->id,
    //             "applicant" => $applicant,
    //         ]

    //     );
    // }

    public function store(ApplicantProfileEducationalBackgroundRequest $request)
    {

        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::user();

        // Tambahkan 'applicant_id' ke data yang telah divalidasi
        $validatedData['applicant_id'] = $applicant->id;

        // Buat entitas ApplicantEducationalBackground dengan data yang telah divalidasi
        ApplicantEducationalBackground::create($validatedData);

        // Mengembalikan pengguna ke halaman sebelumnya dengan pesan sukses.
        return back()->with('success', 'Data berhasil dibuat!');
    }

    public function update(ApplicantProfileEducationalBackgroundRequest $request, $id)
    {

        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::user();

        // Perbarui data ApplicantEducationalBackground yang sesuai dengan 'applicant_id' yang cocok dengan $id dan 'id' sama dengan $id
        ApplicantEducationalBackground::where('applicant_id', $applicant->id)->where('id', $id)->update($validatedData);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = ApplicantEducationalBackground::findOrFail($id); // Mencari data berdasarkan ID
            $data->delete(); // Menghapus data
            return redirect()->back()->with('success', 'Salah satu data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
