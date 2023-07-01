<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Cetak Surat</title>
</head>

<body>
    @foreach ($results as $result)
    <div class="max-w-2xl mx-auto px-4 p-10">
        <!-- Kop Surat -->
        <div class="flex justify-center">
            <div class="w-2/6">
                <!-- Cop surat dengan gambar -->
                <img src="https://tebuireng.online/wp-content/uploads/2015/06/UNHASY_logo.jpg" alt="Logo" class="w-20 h-20">
            </div>
            <div class="w-4/6 text-center" style="">
                <!-- Nama pengirim -->
                <p class="text-lg font-semibold">Universitas Hasyim Asy'ari</p>
                <p class="font-semibold">Tebuireng Jombang</p>
                <p>Jl Irian Jaya No.55 Tebuireng Jombang 61471</p>
            </div>
            <div class="w-2/6"></div>
        </div>
        <hr>

        <!-- Isi Surat -->
        <div>
            <p class="text-l font-bold mt-2">Nomor :</p>
            <p class="text-l font-bold">Lampiran :</p>
            <p class="text-l font-bold mb-4">Hal :</p>

            <p>Kepada Yth,</p>
            <p class="font-bold">Kepala Sarana Universitas Hasyim Asy'ari</p>
            <p>Di-,</p>
            <p class="mb-4">Tempat</p>

            <p class="font-bold">Assalamualaikum Wr Wb</p>
            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;Salam silaturahmi kami haturkan, semoga Allah senantiasa meridhoi segala aktivitas
                kita sehari-hari. Aamiin.
            </p>
            <p class="">
                Sehubungan dengan diadakannya Kegiatan <strong>{{$result->nama_event}}</strong> pada:
            </p>

            <table class="w-250 mb-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Hari</td>
                        <td class="px-2 py-2">:</td>
                        <td class="px-2 py-2"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Tanggal</td>
                        <td class="px-2 py-2">:</td>
                        <td class="px-2 py-2">{{$result->tgl_mulai}}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Jam</td>
                        <td class="px-2 py-2">:</td>
                        <td class="px-2 py-2"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Tempat</td>
                        <td class="px-2 py-2">:</td>
                        <td class="px-2 py-2"></td>
                    </tr>
                </tbody>
            </table>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;Untuk itu, kami selaku panitia memohon izin untuk Sarana dan Prasarana
                <strong>{{$result->nama_sarpras}}</strong> dalam pelaksanaan acara tersebut
                 agar acara yang kami selenggarakan dapat berjalan dengan lancar.
            </p>
            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;Demikian surat permohonan ini kami sampaikan, atas partisipasi dan kerjasamanya kami
                sampaikan banyak terima kasih.
            </p>
            <p class="mb-4 font-bold">Wassalamu'alaikum Wr Wb.</p>

            {{-- <p class="mb-4 absolute inset-y-0 right-0 w-16">Jombang, &nbsp;</p> --}}

            <p class="mt-8 mb-8 font-bold">Ketua</p>
            <p class="mt-8 mb-8 font-bold"></p>
            <p class="mt-8 font-bold">{{$result->name}}</p>
        </div>
    </div>
    @endforeach
</body>
</html>
