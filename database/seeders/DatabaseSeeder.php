<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use App\Models\User;
use App\Models\HrdData;
use App\Models\JobCompany;
use App\Models\Application;
use Illuminate\Support\Str;
use App\Models\JobEducation;
use App\Models\ApplicantData;
use Illuminate\Database\Seeder;
use App\Models\ApplicantContact;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantOrganizationalExperience;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory(50)->create();


        User::create([
            'username' => 'admingmp',
            'email' => 'admin@gmp.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'hrdgmp',
            'email' => 'hrd@gmp.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'hrd',
            'remember_token' => Str::random(10),
        ]);

        HrdData::create([
            'user_id' => User::where('role', 'hrd')->inRandomOrder()->firstOrFail()->id,
            "full_name" => "HRD GMP",
            'hrd_position' => 'Staff Recruitment',
            'photo' => 'images/hrd/profile/default.jpg',
            'is_recruitment_staff' => 1
        ]);

        JobCompany::create([
            "name" => "PT. Graha Mutu Persada Mojokerto",
            "address" => "Jl. Raya Pacing No.1, Mojokerep, Pacing, Kec. Bangsal, Mojokerto, Jawa Timur 61381",
        ]);
        JobCompany::create([
            "name" => "PT. Graha Mutu Persada Depok",
            "address" => "Jl. Proklamasi B No.14, RT/RW 3/14, Mekar Jaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16411",
        ]);
        JobCompany::create([
            "name" => "PT. Graha Mutu Persada Semarang",
            "address" =>
            "Jl. Serasi Raya Pondok Babadan Baru No.D.16, Prampatan, Beji, Kec. Ungaran Timur, Semarang, Jawa Tengah 50519",
        ]);

        JobEducation::create(["name" => "Sekolah Menengah Pertama (SMP)"]);
        JobEducation::create(["name" => "Sekolah Menengah Atas (SMA)"]);
        JobEducation::create(["name" => "Diploma"]);
        JobEducation::create(["name" => "Strata 1 (S1)"]);
        JobEducation::create(["name" => "Strata 2 (S2)"]);
        JobEducation::create(["name" => "Strata 3 (S3)"]);

        Job::factory(6)->create();
        Application::factory(50)->create();
        ApplicantData::factory(10)->create();
        ApplicantContact::factory(10)->create();
        ApplicantWorkExperience::factory(10)->create();
        ApplicantEducationalBackground::factory(10)->create();
        ApplicantOrganizationalExperience::factory(10)->create();
    }



}
