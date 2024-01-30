@if (Auth::user()->role == 'applicant')
    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/applicant/profile/applicantdata"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/applicantdata*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : ({{ json_encode(request()->is('applicant/profile/applicantdata*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M480-240q-56 0-107 17.5T280-170v10h400v-10q-42-35-93-52.5T480-240Zm0-80q69 0 129 21t111 59v-560H240v560q51-38 111-59t129-21Zm0-160q-25 0-42.5-17.5T420-540q0-25 17.5-42.5T480-600q25 0 42.5 17.5T540-540q0 25-17.5 42.5T480-480ZM160-80v-800h640v800H160Zm320-320q58 0 99-41t41-99q0-58-41-99t-99-41q-58 0-99 41t-41 99q0 58 41 99t99 41Zm0-140Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Data Pribadi</span>
    </a>

    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/applicant/profile/contact"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/contact*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : ({{ json_encode(request()->is('applicant/profile/contact*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M160-40v-80h640v80H160Zm0-800v-80h640v80H160Zm320 400q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM80-160v-640h800v640H80Zm150-80q45-56 109-88t141-32q77 0 141 32t109 88h70v-480H160v480h70Zm118 0h264q-29-20-62.5-30T480-280q-36 0-69.5 10T348-240Zm132-280q-17 0-28.5-11.5T440-560q0-17 11.5-28.5T480-600q17 0 28.5 11.5T520-560q0 17-11.5 28.5T480-520Zm0 40Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Kontak</span>
    </a>

    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/applicant/profile/educationalbackgrounds"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/educationalbackground*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : (
                    {{ json_encode(request()->is('applicant/profile/educationalbackground*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Riwayat Pendidikan</span>
    </a>

    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/applicant/profile/workexperiences"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/workexperience*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : ({{ json_encode(request()->is('applicant/profile/workexperience*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Pengalaman Kerja</span>
    </a>

    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/applicant/profile/organizationalexperiences"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/organizationalexperience*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : (
                    {{ json_encode(request()->is('applicant/profile/organizationalexperience*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Pengalaman Organisasi</span>
    </a>

    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false" href="#"
        class="flex items-center text-sm p-2 bg-gray-100 hover:bg-blue-800 hover:text-gray-100">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : '#1f2937'">
                <path
                    d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Pengaturan Keamanan</span>
    </a>
@elseif (Auth()->user()->role == 'hrd')
    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/hrd/profile"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('hrd/profile*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : (
                    {{ json_encode(request()->is('hrd/profile*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Profile Saya</span>
    </a>
    <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
        href="/hrd/profile"
        class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('hrd/securitysettings*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                :fill="isHovered ? '#f9fafb' : (
                    {{ json_encode(request()->is('hrd/securitysettings*')) }} ?
                    '#f9fafb' : '#1e40a')">
                <path
                    d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
            </svg>
        </div>

        <span class="ml-2 font-medium font-montserrat">Pengaturan Keamanan</span>
    </a>
@endif
