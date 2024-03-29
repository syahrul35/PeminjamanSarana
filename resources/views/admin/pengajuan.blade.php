<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar Pengajuan') }}
            </h2>
        </div>
    </x-slot>

    <!-- body -->
    <div>
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <a href="bandingkanEvent">
                <x-button class="justify-center gap-2">
                    <span>{{ __('Bandingkan Events') }}</span>
                </x-button>
            </a>
        </div>
        <div class="py-2">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                        <tr class="text-center">
                            {{-- <th scope="col" class="px-6 py-3">No</th> --}}
                            <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                            <th scope="col" class="px-6 py-3">Acara</th>
                            <th scope="col" class="px-6 py-3">Tanggal Pelaksanaan</th>
                            <th scope="col" class="px-6 py-3">Nama Sarana</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $prevNamaUser = null;
                            $prevNamaEvent = null;
                            $prevTgl = null;
                            $prevTglEvent = null;
                            $sameDateEvents = []; // Array untuk menyimpan tanggal acara yang sudah muncul
                        @endphp

                        <!-- Tampilkan pesan sukses -->
                        @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Tampilkan pesan kesalahan -->
                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                            <ul>
                                <li>
                                    Apabila Terdapat Event dengan Tanggal yang Sama, Mohon Tekan
                                    Tombol Bandingkan Event!
                                </li>
                            </ul>
                        </div>
                        
                        @forelse ( $pengajuan as $pengajuan)

                        @php
                            $tglEvent = \Carbon\Carbon::parse($pengajuan->tgl_mulai)->format('d-m-Y');
                            $isSameDateEvent = isset($sameDateEvents[$tglEvent]);

                            if (!$isSameDateEvent) {
                                $sameDateEvents[$tglEvent] = true;
                            }
                        @endphp


                        @if($pengajuan->nama_event !== $prevNamaEvent)
                            @if ($isSameDateEvent)
                                <tr class="bg-yellow-200 border-t dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-200 text-center">
                            @else
                                <tr class="bg-white border-t dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            @endif
                        @else
                            @if ($isSameDateEvent)
                                <tr class="bg-yellow-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-200 text-center">
                            
                                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            @endif
                        @endif

                            <td class="px-6 py-4">
                                @if($pengajuan->name !== $prevNamaUser)
                                    {{ $pengajuan->name }}<br>
                                @else
                                    <br>
                                @endif
                                @php
                                    $prevNamaUser = $pengajuan->name;
                                @endphp           
                            </td>
                            <td class="px-6 py-4">
                                @if($pengajuan->nama_event !== $prevNamaEvent)
                                    {{ $pengajuan->nama_event }}<br>
                                @else
                                    <br>
                                @endif
                                @php
                                    $prevNamaEvent = $pengajuan->nama_event;
                                @endphp           
                            </td>
                            <td class="px-6 py-4">
                                @if($pengajuan->tgl_mulai !== $prevTgl)
                                    {{ $pengajuan->tgl_mulai }}<br>
                                @else
                                    <br>
                                @endif
                                @php
                                    $prevTgl = $pengajuan->tgl_mulai;
                                @endphp           
                            </td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_sarpras }}</td>
                            <td class="px-6 py-4">
                                {{-- tombol terima --}}
                                <form action="{{ route('terimaPengajuan', $pengajuan->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="id_sarpras" value="{{ $pengajuan->id_sarpras }}">
                                    <input type="hidden" name="id_event" value="{{ $pengajuan->id_event }}">
                                    <input type="hidden" name="id_user" value="{{ $pengajuan->id_user }}">
                                    <input type="hidden" name="tgl_peminjaman" id="" value="{{$pengajuan->tgl_mulai}}">

                                    <x-button class="justify-center gap-2 bg-emerald-500 hover:bg-emerald-600" type="submit">
                                        <span>{{ __('Terima') }}</span>
                                    </x-button>
                                </form>

                                {{-- tombol tolak --}}
                                <form action="{{ route('tolakPengajuan', $pengajuan->id) }}" method="post" type="submit">
                                    @csrf
                                    @method('PUT')
                                    <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600 mt-2">
                                        <span>{{ __('Tolak') }}</span>
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</x-app-layout>