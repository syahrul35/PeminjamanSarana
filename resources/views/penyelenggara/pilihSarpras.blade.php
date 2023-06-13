<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Event</title>
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
<h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Pilih Sarpras</h2>

        <!--Card-->
        <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <form action="{{ route('buatPengajuan', $event) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full rounded focus:bg-white" id="id_event" type="hidden" value="{{ $event->id }}" name="id_event">
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full rounded focus:bg-white" id="id_user" type="hidden" value="{{ $event->id_user }}" name="id_user">
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Nama Event
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            {{ $event->nama_event }}
                        </label>
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Tanggal Mulai
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            {{ $event->tgl_mulai }}
                        </label>
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Tanggal Akhir
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            {{ $event->tgl_akhir }}
                        </label>    
                    </div>
                </div>
    
                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Pilih Sarana dan Prasarana
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        {{-- <input class="form-input rounded block w-full focus:bg-white" id="undangan" type="text" value="{{ $event->undangan }}" name="undangan"> --}}
                        <select name="id_sarpras" class="form-select block w-full focus:bg-white" id="id_sarpras">
                            @foreach ($sarpras as $sarpras)
                            <option value="{{ $sarpras->id }}" {{ old('id_sarpras') == $sarpras->id_sarpras ? 'selected' : '' }}>
                                {{ $sarpras->nama_sarpras }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                
    
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <form action="">
                        <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500" type="submit">
                            <span>{{ __('Buat Pengajuan') }}</span>
                        </x-button>
                    </form>
                </div>
            </form>
        </div>
        <!--/Card-->
</body>
  

