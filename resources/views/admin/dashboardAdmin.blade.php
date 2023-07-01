<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <hr class="h-2">

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between pt-4">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Daftar Pengajuan') }}
        </h2>
    </div>

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

    <div class="py-2">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                        <th scope="col" class="px-6 py-3">Acara</th>
                        <th scope="col" class="px-6 py-3">Nama Sarana</th>
                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-6 py-3">Tanggal Berakhir</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $pengajuan as $pengajuan)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->name }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_event }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_sarpras }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->tgl_mulai }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->tgl_akhir }}</td>
                            <td>
                                @if ($pengajuan->status_pengajuan == 0)
                                    <div class="bg-amber-300 rounded-md">
                                        <span class="text-white">Proses</span>
                                    </div>
                                @elseif($pengajuan->status_pengajuan == 1)
                                    <div class="bg-green-500 rounded-md">
                                        <span class="text-white">Diterima</span>
                                    </div>
                                @else
                                    <div class="bg-rose-500 rounded-md">
                                        <span class="text-white">Ditolak</span>
                                    </div>
                                @endif
                            </td>
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

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between pt-4">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Daftar Peminjaman') }}
        </h2>
    </div>

    <div class="py-2">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                        <th scope="col" class="px-6 py-3">Acara</th>
                        <th scope="col" class="px-6 py-3">Nama Sarana</th>
                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-6 py-3">Tanggal Berakhir</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peminjaman as $peminjaman)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}.</td>
                            <td class="px-6 py-4">{{ $peminjaman->name }}</td>
                            <td class="px-6 py-4">{{ $peminjaman->nama_event }}</td>
                            <td class="px-6 py-4">{{ $peminjaman->nama_sarpras }}</td>
                            <td class="px-6 py-4">{{ $peminjaman->tgl_mulai }}</td>
                            <td class="px-6 py-4">{{ $peminjaman->tgl_akhir }}</td>
                            <td class="px-6 py-4">
                                @if ($peminjaman->status_peminjaman == 0)
                                    <div class="bg-rose-500 rounded-md">
                                        <span class="text-white">Belum Dikembalikan</span>
                                    </div>
                                @else
                                    <div class="bg-green-500 rounded-md">
                                        <span class="text-white">Sudah Dikembalikan</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('terimaPengembalian', $peminjaman->id) }}" method="post" type="submit">
                                    @csrf
                                    @method('PUT')
                                    <x-button class="justify-center gap-2 bg-green-400 hover:bg-green-700">
                                        <span>{{ __('Selesai') }}</span>
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
</x-app-layout>