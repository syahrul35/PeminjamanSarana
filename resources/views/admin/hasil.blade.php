<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Hasil Bandingkan Event') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-2 mt-2">
        <h1 class="font-semibold text-lg">Event 1</h1>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center capitalize">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                        <th scope="col" class="px-6 py-3">Acara</th>
                        <th scope="col" class="px-6 py-3">Nama Sarana</th>
                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-6 py-3">hasil</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>              
                    @foreach ($events[0] as $event)                    
                    <tr class="{{ $results[0] > $results[1] ? 'bg-green-300 text-dark-eval-2' : 'bg-white dark:bg-gray-800' }} border-b text-center">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $event->name }}</td>
                        <td class="px-6 py-4">{{ $event->nama_event }}</td>
                        <td class="px-6 py-4">{{ $event->nama_sarpras }}</td>
                        <td class="px-6 py-4">{{ $event->tgl_mulai }}</td>
                        <td class="px-6 py-4">{{ $results[0] }}</td>
                        <td class="px-6 py-4 flex justify-between">
                            {{-- tombol terima --}}
                            <form action="{{ route('terimaPengajuan', $event->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id_sarpras" value="{{ $event->id_sarpras }}">
                                <input type="hidden" name="id_event" value="{{ $event->id_event }}">
                                <input type="hidden" name="id_user" value="{{ $event->id_user }}">
                                <input type="hidden" name="tgl_peminjaman" id="" value="{{$event->tgl_mulai}}">

                                <x-button class="bg-blue-500 hover:bg-blue-600" type="submit">
                                    <span>{{ __('Terima') }}</span>
                                </x-button>
                            </form>

                            {{-- tombol tolak --}}
                            <form action="{{ route('tolakPengajuan', $event->id) }}" method="post" type="submit">
                                @csrf
                                @method('PUT')
                                <x-button class="bg-red-500 hover:bg-red-600">
                                    <span>{{ __('Tolak') }}</span>
                                </x-button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="py-2 mt-2">
        <h1 class="font-semibold text-lg">Event 2</h1>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center capitalize">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                        <th scope="col" class="px-6 py-3">Acara</th>
                        <th scope="col" class="px-6 py-3">Nama Sarana</th>
                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-6 py-3">hasil</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>              
                    @foreach ($events[1] as $event)                    
                    <tr class="{{ $results[1] > $results[0] ? 'bg-green-300 text-dark-eval-2' : 'bg-white dark:bg-gray-800' }} border-b text-center">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $event->name }}</td>
                        <td class="px-6 py-4">{{ $event->nama_event }}</td>
                        <td class="px-6 py-4">{{ $event->nama_sarpras }}</td>
                        <td class="px-6 py-4">{{ $event->tgl_mulai }}</td>
                        <td class="px-6 py-4">{{ $results[1] }}</td>
                        <td class="px-6 py-4 flex justify-between">
                            {{-- tombol terima --}}
                            <form action="{{ route('terimaPengajuan', $event->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id_sarpras" value="{{ $event->id_sarpras }}">
                                <input type="hidden" name="id_event" value="{{ $event->id_event }}">
                                <input type="hidden" name="id_user" value="{{ $event->id_user }}">
                                <input type="hidden" name="tgl_peminjaman" id="" value="{{$event->tgl_mulai}}">

                                <x-button class="justify-center gap-2 bg-emerald-500 hover:bg-emerald-600" type="submit">
                                    <span>{{ __('Terima') }}</span>
                                </x-button>
                            </form>

                            {{-- tombol tolak --}}
                            <form action="{{ route('tolakPengajuan', $event->id) }}" method="post" type="submit">
                                @csrf
                                @method('PUT')
                                <x-button class="bg-red-500 hover:bg-red-600">
                                    <span>{{ __('Tolak') }}</span>
                                </x-button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
