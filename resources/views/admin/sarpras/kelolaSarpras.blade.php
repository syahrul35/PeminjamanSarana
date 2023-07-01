<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Kelola Sarana dan Prasarana') }}
            </h2>
        </div>
    </x-slot>

    <!-- body -->
    <div>
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <a href="tambahSarpras">
                <x-button class="justify-center gap-2">
                    <x-heroicon-s-plus-small class="w-6 h-6" aria-hidden="true" />
                    <span>{{ __('Tambah') }}</span>
                </x-button>
            </a>
        </div>

        <div class="py-2">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Sarana</th>
                            <th scope="col" class="px-6 py-3">Wewenang</th>
                            <th scope="col" class="px-6 py-3">No HP</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sarpras as $sarpras)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}.</td>
                            <td class="px-6 py-4">{{ $sarpras->nama_sarpras }}</td>
                            <td class="px-6 py-4">{{ $sarpras->nama_wewenang }}</td>
                            <td class="px-6 py-4">{{ $sarpras->telp_wewenang }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route ('editSarpras',$sarpras->id)}}" method="get">
                                    {{ csrf_field() }}
                                    <!-- <button type="submit" class="btn btn-primary btn-sm" style="float:left;">Update</button> -->
                                    <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500">
                                        <span>{{ __('Edit') }}</span>
                                    </x-button>
                                </form>
                                </form>
                                <form action="{{ route('hapusSarpras', $sarpras->id) }}" method="POST" class="mt-1 pt-2">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" class="pt-2 mt-2">
                                    <!-- <button type="submit" class="btn btn-danger btn-sm" style="margin-left:3px;">Delete</button> -->
                                    <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600">
                                        <span>{{ __('Hapus') }}</span>
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