<div class="max-w-3xl">
    @if (
        !auth()->user()->contact ||
            !auth()->user()->contact ||
            auth()->user()->educationalbackground->isEmpty() ||
            auth()->user()->workexperience->isEmpty() ||
            auth()->user()->organizationalexperience->isEmpty())
        <div class="p-4 bg-yellow-100 border-l-4 border-yellow-600">

            <div class="flex space-x-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960"
                        width="35" fill='#d97706'>
                        <path
                            d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-88h120v88q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Zm120-160h80v-200h-80v200Zm40 120q17 0 28.5-11.5T520-360q0-17-11.5-28.5T480-400q-17 0-28.5 11.5T440-360q0 17 11.5 28.5T480-320Z" />
                    </svg>
                </div>

                <div>
                    <h4 class="text-base font-semibold text-yellow-600 font-montserrat">PERHATIAN!
                    </h4>
                    <div class="text-sm font-light text-justify text-gray-800 font-poppins ">
                        Jika Anda belum melengkapi data profil Anda, harap isi dengan benar. Data
                        tersebut akan menjadi bagian penting dalam proses melamar lowongan kerja
                        atau seleksi lamaran. Informasi yang perlu dilengkapi meliputi:
                        <ul class="my-1 ml-6 list-disc">
                            <li>Data Pribadi <span class="font-semibold text-red-600">*</span></li>
                            <li>Kontak <span class="font-semibold text-red-600">*</span></li>
                            <li>Riwayat Pendidikan (Opsional)</li>
                            <li>Pengalaman Kerja (Opsional)</li>
                            <li>Pengalaman Organisasi (Opsional)</li>
                        </ul>
                        Meskipun bersifat opsional, Data mengenai Riwayat Pendidikan, Pengalaman
                        Kerja, dan Pengalaman Organisasi penting untuk menjadi bahan pertimbangan dalam proses seleksi lamaran.
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
