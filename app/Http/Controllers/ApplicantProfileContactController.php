<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantProfileContactRequest;
use Illuminate\Http\Request;
use App\Models\ApplicantContact;
use Illuminate\Support\Facades\Auth;

class ApplicantProfileContactController extends Controller
{
    public function index()
    {
        return view('applicant.profile.contact.index', [
            'title' => 'Profile Saya | Kontak',
            'active' => 'active',
            "profile" => Auth::guard('applicant')->user()->name,
            'applicant_id' => Auth::guard('applicant')->user()->id,
            'applicant' => Auth::guard('applicant')->user()
        ]);
    }

    // public function create()
    // {
    //     return view('applicant.profile.contact.create', [
    //         'title' => 'Ajukan Lamaran | Kontak Pelamar',
    //         'active' => 'active',
    //         'applicant_id' => Auth::guard('applicant')->user()->id,
    //         'applicant' => Auth::guard('applicant')->user()
    //     ]);
    // }

    public function store(ApplicantProfileContactRequest $request)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();
        
        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::guard('applicant')->user();
        
        // Tambahkan 'applicant_id' ke data yang telah divalidasi
        $validatedData['applicant_id'] = $applicant->id;
        
        // Buat entitas ApplicantContact dengan data yang telah divalidasi
        ApplicantContact::create($validatedData);
        
        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil dibuat!');
    }
    

    public function update(ApplicantProfileContactRequest $request)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $request->validated();
    
        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::guard('applicant')->user();
    
        // Perbarui data ApplicantContact yang sesuai dengan 'applicant_id' yang cocok dengan $id
        ApplicantContact::where('applicant_id', $applicant->id)->update($validatedData);
    
        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data berhasil diperbarui!');
    }
    
}
