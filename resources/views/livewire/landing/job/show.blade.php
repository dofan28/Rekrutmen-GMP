<div>
    <div class="flex flex-col lg:flex-row  shadow-lg p-6 pt-28" x-data="{ zoomed: false, mouseX: 0, mouseY: 0, imageWidth: 0, imageHeight: 0, showModal: false, modalImage: '' }"
        x-on:mousemove="mouseX = $event.clientX; mouseY = $event.clientY">
        <!-- Gambar di samping kiri -->
        <div class="lg:w-1/3 mb-4 lg:mb-0 relative overflow-hidden" x-on:mouseleave="zoomed = false"
            x-ref="imageContainer">
            <img src="/images/hrd/job/default.jpg" alt="Gambar Lowongan"
                class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                :class="{ 'scale-150 cursor-pointer': zoomed }"
                x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) / imageWidth) * 100
                    +
                    '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 + '%;'"
                x-on:click="
                showModal = true;
                modalImage = '/images/hrd/job/default.jpg'; // Ganti dengan sumber gambar yang sebenarnya
            ">
        </div>
        <!-- Detail informasi di samping kanan -->
        <div class="lg:w-2/3 lg:pl-6">
            <h2 class="text-3xl font-bold mb-2 text-gray-800">Posisi Pekerjaan</h2>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Perusahaan:</span> Nama Perusahaan</p>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Alamat:</span> Alamat Perusahaan</p>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Pendidikan:</span> Tingkat Pendidikan</p>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Jobdesk:</span> Deskripsi Jobdesk</p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Deskripsi Pekerjaan:</h3>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed
                    cursus ante dapibus diam.
                </p>
            </div>
        </div>
        <!-- Modal -->
        <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-end pb-6"
            x-show="showModal" x-on:click="showModal = false">
            <div class="bg-white rounded-lg p-4 w-2/5 h-5/6">
                <img :src="modalImage" alt="Gambar Modal" class=" w-full h-full p-100">
            </div>
        </div>
    </div>


</div>
