<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantProfileWorkExperienceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantWorkExperience;

class ApplicantProfileWorkExperienceController extends Controller
{
    public function index()
    {
        $applicant = Auth::user();
        return view('applicant.profile.work-experience.index', [
            'title' => 'Pengalaman Kerja',
            'active' => 'active',
            "profile" => $applicant->name,
            "applicant_id" => $applicant->id,
            "applicant" => $applicant,
        ]);
    }

    // public function create()
    // {
    //     $applicant = Auth::user();
    //     return view('applicant.work-experience.create', [
    //         'title' => 'Ajukan Lamaran | Pengalaman Kerja',
    //         'active' => 'active',
    //         "applicant_id" => $applicant->id,
    //         "applicant" => $applicant,
    //     ]);
    // }

    public function store(ApplicantProfileWorkExperienceRequest $request)
    {
        // dd($request);
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::user();

        // Tambahkan 'applicant_id' ke data yang telah divalidasi
        $validatedData['applicant_id'] = $applicant->id;

        // Buat entitas ApplicantWorkExperience dengan data yang telah divalidasi
        ApplicantWorkExperience::create($validatedData);

        // Mengembalikan pengguna ke halaman sebelumnya dengan pesan sukses.
        return back()->with('success', 'Data berhasil dibuat!');
    }



    public function update(ApplicantProfileWorkExperienceRequest $request, $id)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::user();

        // Perbarui data ApplicantWorkExperience yang sesuai dengan 'applicant_id' yang cocok dengan $id dan 'id' sama dengan $id
        ApplicantWorkExperience::where('applicant_id', $applicant->id)->where('id', $id)->update($validatedData);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = ApplicantWorkExperience::findOrFail($id); // Mencari data berdasarkan ID
            $data->delete(); // Menghapus data
            return redirect()->back()->with('success', 'Salah satu data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
