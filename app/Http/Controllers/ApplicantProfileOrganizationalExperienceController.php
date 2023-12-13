<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantProfileOrganizationalExperienceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantOrganizationalExperience;

class ApplicantProfileOrganizationalExperienceController extends Controller
{
    public function index()
    {
        return view('applicant.profile.organizational-experience.index', [
            'title' => 'Pengalaman Organisasi',
            'active' => 'active',
            "profile" => Auth::user()->name,
            'applicant_id' => Auth::user()->id,
            'applicant' => Auth::user()
        ]);
    }

    // public function create()
    // {
    //     return view('applicant.organizational-experience.create', [
    //         'title' => 'Ajukan Lamaran | Pengalaman Organisasi',
    //         'active' => 'active',
    //         'applicant' => Auth::user()
    //     ]);
    // }

    public function store(ApplicantProfileOrganizationalExperienceRequest $request)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::user();

        // Tambahkan 'applicant_id' ke data yang telah divalidasi
        $validatedData['user_id'] = $applicant->id;

        // Buat entitas ApplicantOrganizationalExperience dengan data yang telah divalidasi
        ApplicantOrganizationalExperience::create($validatedData);

        // Mengembalikan pengguna ke halaman sebelumnya dengan pesan sukses.
        return back()->with('success', 'Data berhasil dibuat!');
    }

    public function update(ApplicantProfileOrganizationalExperienceRequest $request, $id)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::user();

        // Perbarui data ApplicantOrganizationalExperience yang sesuai dengan 'applicant_id' yang cocok dengan $id dan 'id' sama dengan $id
        ApplicantOrganizationalExperience::where('applicant_id', $applicant->id)->where('id', $id)->update($validatedData);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = ApplicantOrganizationalExperience::findOrFail($id); // Mencari data berdasarkan ID
            $data->delete(); // Menghapus data
            return redirect()->back()->with('success', 'Salah satu data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
