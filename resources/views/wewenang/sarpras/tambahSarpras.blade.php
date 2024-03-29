<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Sarana dan Prasarana</title>
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
    <!--Section container-->
    <section class="w-full lg:w-4/5">

        <!--Title-->
        <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Tambah Sarana dan Prasarana</h2>

        <!--Card-->
        <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <form action="{{ route('simpanSarpras') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="md:flex mb-6">
                    <input type="hidden" name="id_wewenang" id="id_wewenang" value="{{ Auth::user()->id }}">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
                            Nama Kategori
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select name="id_kategori" class="form-select block w-full focus:bg-white" id="id_kategori">
                            @foreach ($sarpras as $sarpras)
                            <option value="{{ $sarpras->id }}" {{ old('id_kategori') == $sarpras->id_kategori ? 'selected' : '' }}>
                                {{ $sarpras->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="md:flex mb-4">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield" name="">
                            Nama Sarana
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full focus:bg-white" id="nama_sarpras" type="text" value="" name="nama_sarpras">
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-1/3">
                        <a href="sarana">
                            <button class="shadow bg-gray-600 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                Cancel
                            </button>
                        </a>
                        <a href="">
                            <button class="shadow bg-green-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Save
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <!--/Card-->
    </section>
    <!--/Section container-->
</body>