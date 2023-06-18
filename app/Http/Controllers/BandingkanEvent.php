<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Events;
use App\Models\Sarpras;

class BandingkanEvent extends Controller
{

    private $hasil;

    public function index(Request $request)
    {
        // dd('test');
        $all_event = Events::all();
        $results = $this->hasil;
        $events = [];

        if (isset($_POST['generate'])) {
            $select1Value = $request->input('select1');
            $select2Value = $request->input('select2');
            $events1 = Events::where('id', $select1Value)->get();
            $events2 = Events::where('id', $select2Value)->get();
            $events[] = $events1;
            $events[] = $events2;
        }


        return view('admin.bandingkanEvent', [
            'events' => $all_event,
            'selected_events' => $events,
            'results' => $results
        ]);
    }

    public function rumus(Request $request)
    {
        // dd($request->input('jumlah_peserta1'));
        $jumlah_peserta1 = $request->input('jumlah_peserta1');
        $pemateri1 = $request->input('pemateri1');
        $undangan1 = $request->input('undangan1');
        $pengeluaran1 = $request->input('pengeluaran1');
        $pendapatan1 = $request->input('pendapatan1');

        $jumlah_peserta2 = $request->input('jumlah_peserta2');
        $pemateri2 = $request->input('pemateri2');
        $undangan2 = $request->input('undangan2');
        $pengeluaran2 = $request->input('pengeluaran2');
        $pendapatan2 = $request->input('pendapatan2');

        $matriks_keputusan = array(
            array($jumlah_peserta1, $pemateri1, $undangan1, $pengeluaran1, $pendapatan1),
            array($jumlah_peserta2, $pemateri2, $undangan2, $pengeluaran2, $pendapatan2)
        );

        $bobot_kriteria = array(5, 5, 4, 3, 3);

        // Step 1: Normalisasi matriks keputusan
        $normalisasi_matriks = array();
        $m = count($matriks_keputusan);
        $n = count($matriks_keputusan[0]);

        for ($j = 0; $j < $n; $j++) {
            $col = array_column($matriks_keputusan, $j);
            $sum_squares = 0;

            for ($i = 0; $i < $m; $i++) {
                $sum_squares += pow($matriks_keputusan[$i][$j], 2);
            }

            $sqrt_sum_squares = sqrt($sum_squares);

            for ($i = 0; $i < $m; $i++) {
                $normalisasi_matriks[$i][$j] = round(($matriks_keputusan[$i][$j] / $sqrt_sum_squares) * $bobot_kriteria[$j], 4);
            }
        }

        // Step 2: Menghitung matriks solusi ideal positif (A+) dan matriks solusi ideal negatif (A-)
        $a_plus = array();
        $a_minus = array();

        for ($j = 0; $j < $n; $j++) {
            $col = array_column($normalisasi_matriks, $j);
            $a_plus[$j] = max($col);
            $a_minus[$j] = min($col);
        }

        // Step 3: Menghitung jarak alternatif terhadap solusi ideal positif (D+)
        $d_plus = array();

        for ($i = 0; $i < $m; $i++) {
            $sum = 0;

            for ($j = 0; $j < $n; $j++) {
                $sum += pow($normalisasi_matriks[$i][$j] - $a_plus[$j], 2);
            }

            $d_plus[$i] = sqrt($sum);
        }

        // Step 4: Menghitung jarak alternatif terhadap solusi ideal negatif (D-)
        $d_minus = array();

        for ($i = 0; $i < $m; $i++) {
            $sum = 0;

            for ($j = 0; $j < $n; $j++) {
                $sum += pow($normalisasi_matriks[$i][$j] - $a_minus[$j], 2);
            }

            $d_minus[$i] = sqrt($sum);
        }

        // Step 5: Menghitung nilai preferensi (V)
        $v = array();

        for ($i = 0; $i < $m; $i++) {
            $v[$i] = round($d_minus[$i] / ($d_plus[$i] + $d_minus[$i]), 4);
        }

        
        // Output
        // return $v;
        $this->hasil = $v;
        return redirect('/admin/bandingkanEvent');
        // dd($this->hasil);
    }
}
