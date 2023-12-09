<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApplicantProfileApplicantDataRequest;

class ApplicantProfileApplicantDataController extends Controller
{
    public function index()
    {
        $applicant = Auth::guard('applicant')->user();
        return view("applicant.profile.applicant-data.index", [
            "title" => "Profile Saya | Data Pribadi",
            "active" => "active",
            "profile" => $applicant->name,
            "applicant_id" => $applicant->id,
            "applicant" => $applicant,
        ]);
    }

    // public function create()
    // {
    //     $applicant = Auth::guard('applicant')->user();
    //     return view("applicant.applicant-data.create", [
    //         "title" => "Ajukan Lamaran | Data Pelamar",
    //         "active" => "active",
    //         "applicant_id" => $applicant->id,
    //         "applicant" => $applicant,
    //     ]);
    // }

    public function store(ApplicantProfileApplicantDataRequest $request)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::guard('applicant')->user();

        // Tambahkan 'applicant_id' ke data yang telah divalidasi
        $validatedData['applicant_id'] = $applicant->id;

        // Jika ada berkas gambar yang diunggah, simpan di direktori 'images/applicant/profile'
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/applicant/profile');
        }

        // Buat entitas ApplicantData dengan data yang telah divalidasi
        ApplicantData::create($validatedData);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil dibuat!');
    }


    public function update(ApplicantProfileApplicantDataRequest $request)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::guard('applicant')->user();

        // Periksa apakah ada berkas gambar yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto profil yang lama jika ada
            $currentPhoto = $applicant->applicantdata->photo;
            if ($currentPhoto !== null) {
                Storage::delete($currentPhoto);
            }
            
            // Simpan berkas gambar yang baru diunggah
            $validatedData['photo'] = $request->file('photo')->store('images/applicant/profile');
        }

        // Dapatkan data aplikasi yang terkait dengan pengguna
        $applicantData = $applicant->applicantdata;

        // Perbarui hanya data yang telah divalidasi
        $applicantData->update($validatedData);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil diperbarui!');
    }
}
