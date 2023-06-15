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
        <a href="tambahEvent">
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
                            <th scope="col" class="px-6 py-3">Nama Event</th>
                            <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                            <th scope="col" class="px-6 py-3">Tanggal Akhir</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($event as $event)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}.</td>
                            <td class="px-6 py-4">{{ $event->nama_event }}</td>
                            <td class="px-6 py-4">{{ $event->tgl_mulai }}</td>
                            <td class="px-6 py-4">{{ $event->tgl_akhir }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route ('editEvent',$event->id)}}" method="get">
                                    {{ csrf_field() }}
                                    <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500">
                                        <span>{{ __('Edit') }}</span>
                                    </x-button>
                                </form>
                                <form action="{{ route('hapusEvent', $event->id) }}" method="POST" class="mt-1 pt-2">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" class="pt-2 mt-2">
                                    <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600">
                                        <span>{{ __('Hapus') }}</span>
                                    </x-button>
                                </form>
                                <form action="{{ route ('pilihSarpras',$event->id)}}" method="get" class="mt-1 pt-2">
                                    {{ csrf_field() }}
                                    <x-button class="justify-center gap-2 bg-emarald-500 hover:bg-emerald-600">
                                        <span>{{ __('Pilih Sarpras') }}</span>
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