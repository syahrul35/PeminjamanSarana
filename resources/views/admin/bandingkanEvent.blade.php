<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Bandingkan Event') }}
            </h2>
        </div>
    </x-slot>

    <!-- body -->
    <body>
       <div class="p-2 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5">
            <!--Card 1-->
            <div class="rounded overflow-hidden shadow-lg bg-zinc-200">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Event 1</div>

                    <div class="md:flex mb-4">
                        <div class="md:w-2/6">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                Pilih Event
                            </label>
                        </div>
                        <div class="md:w-3/6 mx-2">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                <select name="id_wewenang" class="form-select block w-full focus:bg-white" id="my-select" data-item="" value="">
                                    @foreach ($event1 as $event1)
                                    <option value="{{ $event1->id }}" {{ $event1->id_event == $event1->id  ? 'selected' : ''}}>{{ $event1->nama_event }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>


                    <hr class="mb-3">
                    <div class="md:flex mb-4">
                        <div class="md:w-2/6">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                Jumlah Peserta
                            </label>
                        </div>
                        <div class="md:w-3/6 mx-2">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                2000
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                Hj Udin
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                Pak RT
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                2.000.000
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                12.000.000
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
                        </div>
                    </div>
                </div>
                
            </div>
            <!--Card 2-->
            <div class="rounded overflow-hidden shadow-lg bg-zinc-300">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Event 2</div>
                    <div class="md:flex mb-4">
                        <div class="md:w-2/6">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 " for="my-textfield" name="">
                                Pilih Event
                            </label>
                        </div>
                        <div class="md:w-3/6 mx-2">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                <select name="id_event" class="form-select block w-full focus:bg-white" id="my-select" data-item="" value="">
                                    @foreach ($event2 as $event2)
                                    <option value="{{ $event2->id }}" {{ $event2->id_event == $event2->id  ? 'selected' : ''}}>{{ $event2->nama_event }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>

                    <hr class="mb-3">
                    <div class="md:flex mb-4">
                        <div class="md:w-2/6">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                Jumlah Peserta
                            </label>
                        </div>
                        <div class="md:w-3/6 mx-2">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                                {{$event2->jumlah_peserta}}
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                {{$event2->pemateri}}
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                {{$event2->undangan}}
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                {{$event2->biaya_pengeluaran}}
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
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
                                {{$event2->biaya_pendapatan}}
                            </label>
                        </div>
                        <div class="md:w-1/6">
                            <input class="form-input block w-full focus:bg-white " id="nama_sarpras" type="text" value="" name="nama_sarpras">
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    
        {{-- tombol Hitung --}}
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <x-button class="justify-center gap-2">
                    <x-heroicon-s-plus-small class="w-6 h-6" aria-hidden="true" />
                    <span>{{ __('Hitung') }}</span>
                </x-button>
            </div>

            <div class="py-2 m-8 max-w-[50%]">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                        <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                            <tr class="text-center">
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Acara</th>
                                <th scope="col" class="px-6 py-3">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                                <td class="px-6 py-4">1.</td>
                                <td class="px-6 py-4">sip</td>
                                <td class="px-6 py-4">0,07868</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#EventSelect').on('change', function () {
                var eventId = $(this).val();
                if (eventId) {
                    $.ajax({
                        url: '/events/' + eventId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#nameInput').val(data.nama_event);
                            $('#emailInput').val(data.jumlah);
                        }
                    });
                } else {
                    $('#nameInput').val('');
                    $('#emailInput').val('');
                }
            });
        });
    </script>

</x-app-layout>