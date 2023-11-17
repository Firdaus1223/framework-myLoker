<nav class="flex flex-row p-8 justify-between items-center">
    <img src="{{ asset('assets/images/myLoker.png') }}" alt="" class="w-fit h-8">
    {{-- <p class=""style="margin-left: -300px;">| Selamat datang {{ $namaPelamar }}</p> --}}
    <div class="flex flex-row gap-8 items-center">
        <ul class="flex flex-row gap-8">
            <li>Tentang</li>
            <li>Lowongan</li>
            <li>Tetimonial</li>
            <li>Berita</li>
            <li>Pengaturan</li>
        </ul>

        <div class="basis-1/4 flex justify-end">
            <a href="{{ route('login') }}" class="group relative bg-blue-900 px-8 py-4 w-36 rounded-lg font-bold flex justify-center gap-4 hover:scale-105 group/expand-hover:px-10 hover:bg-blue-800 transition ease-in">
                <p class="invisible">Sign In</p>
                <p class="absolute text-white group-hover:-translate-x-[40%] transition ease-out">Sign In</p>
                <span class="absolute invisible group-hover:visible group-hover:inline-block group-hover:translate-x-[150%] transition ease-out ">
                    <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M647-440H200q-17 0-28.5-11.5T160-480q0-17 11.5-28.5T200-520h447L451-716q-12-12-11.5-28t12.5-28q12-11 28-11.5t28 11.5l264 264q6 6 8.5 13t2.5 15q0 8-2.5 15t-8.5 13L508-188q-11 11-27.5 11T452-188q-12-12-12-28.5t12-28.5l195-195Z"/></svg>
                </span>
            </a>
        </div>

    </div>
</nav>
