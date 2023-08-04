<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Event</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <style>
        .max-h-64 {
            max-height: 16rem;
        }

        /*Quick overrides of the form input as using the CDN version*/
        .form-input,
        .form-textarea,
        .form-select,
        .form-multiselect {
            background-color: #edf2f7;
        }
    </style>

</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal m-4 my-4 justify-center">
    
<!--Title-->
<h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Edit Event</h2>

        <!--Card-->
        <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <form action="{{ route('updateEvent', $event) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full rounded focus:bg-white" id="id_user" type="hide" value="{{ Auth::user()->id }}" name="id_user">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Nama Event
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full rounded focus:bg-white" id="nama_event" type="text" value="{{ $event->nama_event }}" name="nama_event">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Tanggal Mulai
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full rounded focus:bg-white" id="tgl_mulai" type="date" value="{{ $event->tgl_mulai }}" name="tgl_mulai">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Jumlah Peserta
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="jumlah_peserta" type="text" value="{{ $event->jumlah_peserta }}" name="jumlah_peserta">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Pemateri
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="pemateri" type="text" value="{{ $event->pemateri }}" name="pemateri">
                    </div>
                </div>

                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Jangkauan Pemateri
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="pemateri" type="text" value="{{ $event->nilai_pemateri }}" name="pemateri">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Undangan
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="undangan" type="text" value="{{ $event->undangan }}" name="undangan">
                    </div>
                </div>

                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Jangkauan Undangan
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="pemateri" type="text" value="{{ $event->nilai_undangan }}" name="pemateri">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Biaya Pengeluaran Event
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="biaya_pengeluaran" type="text" value="{{ $event->biaya_pengeluaran }}" name="biaya_pengeluaran">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Biaya Pendapatan Event
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input rounded block w-full focus:bg-white" id="biaya_pendapatan" type="text" value="{{ $event->biaya_pendapatan }}" name="biaya_pendapatan">
                    </div>
                </div>
    
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <form action="">
                        <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500" type="submit">
                            <span>{{ __('Save') }}</span>
                        </x-button>
                    </form>
                </div>
            </form>
        </div>
        <!--/Card-->
</body>
  

