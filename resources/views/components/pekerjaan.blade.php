<section>
    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-24 lg:py-32">
      <!-- Component -->
      <div class="flex flex-col items-center">
        <!-- Heading Div -->
        <div class="mb-8 max-w-[800px] text-center md:mb-12 lg:mb-16">
          <h2 class="mb-4 mt-6 text-3xl font-extrabold md:text-5xl">Temukan berbagai pekerjaan impianmu disini</h2>
          <p class="mx-auto mt-4 max-w-[528px] text-[#636262]">Mari mencoba keberuntunganmu.</p>
        </div>
        <!-- Job Listings -->
        <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @php
                $pekerjaans = App\Models\Pekerjaan::take(3)->get();
            @endphp
            @foreach ($pekerjaans as $pekerjaan)
            <a href="{{ route('pekerjaan.show', $pekerjaan->id) }}" class="flex max-w-full flex-col gap-4 rounded-md px-4 md:px-2">
                <img alt="" src="{{ asset('assets/images/pekerjaan.jpg') }}" class="inline-block h-60 w-full rounded-2xl object-cover" />
                <div class="flex h-full w-full flex-col items-start justify-around px-0 py-4">
                    <div class="mb-4 flex flex-col items-start gap-4">
                        <div class="rounded-md bg-[#f6ad1b] px-2 py-1.5">
                            <p>{{ $pekerjaan->posisi }}</p>
                        </div>
                        <p class="text-xl font-bold md:text-2xl">{{ $pekerjaan->deskripsi }}</p>
                    </div>
                    <!-- Salary -->
                    <div class="flex flex-col items-start md:flex-row lg:items-center">
                        <p class="text-sm text-[#636262]">Gaji: ${{ number_format($pekerjaan->gaji, 2) }}</p>
                        <p class="ml-2 mr-2 hidden text-sm text-[#636262] md:block">-</p>
                        <p class="text-sm text-[#636262]">{{ $pekerjaan->tanggal_posting }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
      </div>
    </div>
</section>
