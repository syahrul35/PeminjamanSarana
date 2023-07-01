<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Bandingkan Event') }}
            </h2>
        </div>
    </x-slot>

    <!-- body -->
    <div class="grid grid-cols-1 gap-3">
        <h1 class="text-md font-semibold leading-tight">Pilih Event</h1>
        <form method="POST" action="{{route('bandingkanEvent')}}" class="grid grid-cols-3 gap-3 w-2/3">
            @csrf
            <select name="select1" id="select1" class="form-select block w-full text-black">
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->nama_event }}</option>
                @endforeach
            </select>
            <select name="select2" id="select2" class="form-select block w-full text-black">
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->nama_event }}</option>
                @endforeach
            </select>
            <x-button name="generate" type="submit">{{ __('Submit') }}</x-button>
        </form>

        

        {{-- event --}}
        <form action="{{route('rumus')}}" method="GET">      
        @csrf
        <div class="rounded overflow-hidden shadow-lg bg-zinc-300">
            @if (isset($_POST['generate']))
            <div class="px-6 py-4 bg-zinc-300">
                @foreach ($selected_events[0] as $event)
                    <div class="font-bold text-xl mb-2 text-gray-600">{{$event->nama_event}}</div><hr class="mb-4">
                        <div class="md:flex mb-4">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Jumlah Peserta
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->jumlah_peserta}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="jumlah_peserta1" required min="1" max="5">
                            </div>
                        </div>

                        <div class="md:flex mb-4">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Nama Pemateri
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->pemateri}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="pemateri1" required min="1" max="5">
                            </div>
                        </div>

                        <div class="md:flex mb-4">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Nama Undangan
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->undangan}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="undangan1" required min="1" max="4">
                            </div>
                        </div>

                        <div class="md:flex mb-4">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Biaya Pengeluaran
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->biaya_pengeluaran}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="pengeluaran1" required min="1" max="3">
                            </div>
                        </div>

                        <div class="md:flex mb-4">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Biaya Pendapatan
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->biaya_pendapatan}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="pendapatan1" required min="1" max="3">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-6 py-4 mt-2 bg-zinc-300">
                @foreach ($selected_events[1] as $event)
                    <div class="font-bold text-xl mb-2 text-gray-600 px-6 py-4">{{$event->nama_event}}</div><hr class="mb-4">
                        <div class="md:flex mb-4 px-6">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Jumlah Peserta
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->jumlah_peserta}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="jumlah_peserta2" required min="1" max="5">
                            </div>
                        </div>

                        <div class="md:flex mb-4 px-6">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Nama Pemateri
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->pemateri}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="pemateri2" required min="1" max="5">
                            </div>
                        </div>

                        <div class="md:flex mb-4 px-6">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Nama Undangan
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->undangan}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="undangan2" required min="1" max="4">
                            </div>
                        </div>

                        <div class="md:flex mb-4 px-6">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Biaya Pengeluaran
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->biaya_pengeluaran}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="pengeluaran2" required min="1" max="3">
                            </div>
                        </div>

                        <div class="md:flex mb-4 px-6">
                            <div class="md:w-2/6">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    Biaya Pendapatan
                                </label>
                            </div>
                            <div class="md:w-3/6 mx-2">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                    {{$event->biaya_pendapatan}}
                                </label>
                            </div>
                            <div class="md:w-1/6">
                                <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="number" value="" name="pendapatan2" required min="1" max="3">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            <div class="mt-2">
                <a href="/admin/hasil">
                    <x-button class="justify-center gap-2">
                        <x-heroicon-s-plus-small class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('hasil') }}</span>
                    </x-button>
                </a>
            </div>   
        </form>     
    </div>

</x-app-layout>