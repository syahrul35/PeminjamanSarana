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
                @if (count($event) > 1)
                @foreach ($event as $acara)
                <option value="{{ $acara->id }}">{{ $acara->nama_event }}</option>
                @endforeach
                @endif
                @endforeach
            </select>
            <select name="select2" id="select2" class="form-select block w-full text-black">
                @foreach ($events as $event)
                @if (count($event) > 1)
                @foreach ($event as $acara)
                <option value="{{ $acara->id }}">{{ $acara->nama_event }}</option>
                @endforeach
                @endif
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
                    <input class="form-input hidden" id="id1" type="number" value="{{ $event->id }}" name="id1">

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
                                @if($event->jumlah_peserta >= 1000)
                                    <input class="form-input w-full focus:bg-white hidden" id="nama_sarpras" type="number" value="5" name="jumlah_peserta1" required min="1" max="5">
                                @elseif($event->jumlah_peserta >= 500)
                                    <input class="form-input w-full focus:bg-white hidden" id="nama_sarpras" type="number" value="4" name="jumlah_peserta1" required min="1" max="5">
                                @elseif($event->jumlah_peserta >= 100)
                                    <input class="form-input w-full focus:bg-white hidden" id="nama_sarpras" type="number" value="3" name="jumlah_peserta1" required min="1" max="5">
                                @elseif($event->jumlah_peserta >= 50)
                                    <input class="form-input w-full focus:bg-white hidden" id="nama_sarpras" type="number" value="2" name="jumlah_peserta1" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden" id="nama_sarpras" type="number" value="1" name="jumlah_peserta1" required min="1" max="5">
                                @endif
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
                                @if($event->nilai_pemateri == 'Internasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="5" name="pemateri1" required min="1" max="5">
                                @elseif($event->nilai_pemateri == 'Nasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="4" name="pemateri1" required min="1" max="5">
                                @elseif($event->nilai_pemateri == 'Provinsi')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="pemateri1" required min="1" max="5">
                                @elseif($event->nilai_pemateri == 'Kabupaten')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="pemateri1" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="pemateri1" required min="1" max="5">
                                @endif
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
                                @if($event->nilai_undangan == 'Internasional')
                                <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="4" name="undangan1" required min="1" max="5">
                                @elseif($event->nilai_undangan == 'Nasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="undangan1" required min="1" max="5">
                                @elseif($event->nilai_undangan == 'Provinsi' || 'Kabupaten')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="undangan1" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="undangan1" required min="1" max="5">
                                @endif
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
                                @if($event->biaya_pengeluaran >= 5000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="pengeluaran1" required min="1" max="5">
                                @elseif($event->biaya_pengeluaran < 1000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="pengeluaran1" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="pengeluaran1" required min="1" max="5">
                                @endif
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
                                @if($event->biaya_pendapatan >= 5000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="pendapatan1" required min="1" max="5">
                                @elseif($event->biaya_pendapatan < 1000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="pendapatan1" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="pendapatan1" required min="1" max="5">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-6 py-4 mt-2 bg-zinc-300">
                @foreach ($selected_events[1] as $event)
                    <div class="font-bold text-xl mb-2 text-gray-600 px-6 py-4">{{$event->nama_event}}</div><hr class="mb-4">
                        <input class="form-input hidden" id="id2" type="number" value="{{ $event->id }}" name="id2">

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
                                @if($event->jumlah_peserta >= 1000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="5" name="jumlah_peserta2" required min="1" max="5">
                                @elseif($event->jumlah_peserta >= 500)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="4" name="jumlah_peserta2" required min="1" max="5">
                                @elseif($event->jumlah_peserta >= 100)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="jumlah_peserta2" required min="1" max="5">
                                @elseif($event->jumlah_peserta >= 50)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="jumlah_peserta2" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="jumlah_peserta2" required min="1" max="5">
                                @endif

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
                                @if($event->nilai_pemateri == 'Internasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="5" name="pemateri2" required min="1" max="5">
                                @elseif($event->nilai_pemateri == 'Nasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="4" name="pemateri2" required min="1" max="5">
                                @elseif($event->nilai_pemateri == 'Provinsi')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="pemateri2" required min="1" max="5">
                                @elseif($event->nilai_pemateri == 'Kabupaten')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="pemateri2" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="pemateri2" required min="1" max="5">
                                @endif
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
                                @if($event->nilai_undangan == 'Internasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="4" name="undangan2" required min="1" max="5">
                                @elseif($event->nilai_undangan == 'Nasional')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="undangan2" required min="1" max="5">
                                @elseif($event->nilai_undangan == 'Provinsi' || 'Kabupaten')
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="undangan2" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="undangan2" required min="1" max="5">
                                @endif
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
                                @if($event->biaya_pengeluaran >= 5000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="pengeluaran2" required min="1" max="5">
                                @elseif($event->biaya_pengeluaran < 1000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="pengeluaran2" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="pengeluaran2" required min="1" max="5">
                                @endif
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
                                @if($event->biaya_pendapatan >= 5000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="3" name="pendapatan2" required min="1" max="5">
                                @elseif($event->biaya_pendapatan < 1000000)
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="1" name="pendapatan2" required min="1" max="5">
                                @else
                                    <input class="form-input w-full focus:bg-white hidden " id="nama_sarpras" type="number" value="2" name="pendapatan2" required min="1" max="5">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            <div class="mt-2 mb-2">
                <a href="/admin/hasil">
                    <x-button class="justify-center gap-2">
                        <span>{{ __('Hasil') }}</span>
                    </x-button>
                </a>
            </div>    
        </form>     
    </div>

</x-app-layout>