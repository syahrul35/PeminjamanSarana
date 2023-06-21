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

        $inputs = array(
            array($jumlah_peserta1, $pemateri1, $undangan1, $pengeluaran1, $pendapatan1),
            array($jumlah_peserta2, $pemateri2, $undangan2, $pengeluaran2, $pendapatan2)
        );

        $weights = array(5, 5, 4, 3, 3);
        $criteriaTypes = ['benefit', 'benefit', 'benefit', 'cost', 'benefit'];

        // Validasi bobot
        $totalWeights = array_sum($weights);
        if ($totalWeights !== 20) {
            die("Total bobot harus bernilai 20.");
        }

        // Validasi inputan
        $inputCount = count($inputs);
        if ($inputCount < 2) {
            die("Minimal dua inputan diperlukan.");
        }

        $attributeCount = count($weights);
        foreach ($inputs as $input) {
            if (count($input) !== $attributeCount) {
                die("Jumlah atribut pada inputan tidak sesuai dengan jumlah bobot.");
            }
        }

        // Normalisasi matriks keputusan
        $normalizedMatrix = [];
        for ($i = 0; $i < $attributeCount; $i++) {
            $sumSquared = 0;
            for ($j = 0; $j < $inputCount; $j++) {
                $sumSquared += $inputs[$j][$i] * $inputs[$j][$i];
            }
            $sqrtSum = sqrt($sumSquared);
            $column = [];
            for ($j = 0; $j < $inputCount; $j++) {
                $column[] = $inputs[$j][$i] / $sqrtSum;
            }
            $normalizedMatrix[] = $column;
        }

        // Matriks keputusan terbobot
        $weightedMatrix = [];
        for ($i = 0; $i < $attributeCount; $i++) {
            $column = [];
            for ($j = 0; $j < $inputCount; $j++) {
                $column[] = $normalizedMatrix[$i][$j] * $weights[$i];
            }
            $weightedMatrix[] = $column;
        }

        // Solusi ideal positif dan negatif
        $idealPositive = [];
        $idealNegative = [];
        for ($i = 0; $i < $attributeCount; $i++) {
            $maxValue = max($weightedMatrix[$i]);
            $minValue = min($weightedMatrix[$i]);
            if ($criteriaTypes[$i] === 'benefit') {
                $idealPositive[] = $maxValue;
                $idealNegative[] = $minValue;
            } else if ($criteriaTypes[$i] === 'cost') {
                $idealPositive[] = $minValue;
                $idealNegative[] = $maxValue;
            } else {
                die("Tipe kriteria tidak valid.");
            }
        }

        // Jarak solusi
        $positiveDistances = [];
        $negativeDistances = [];
        for ($i = 0; $i < $inputCount; $i++) {
            $positiveDistance = 0;
            $negativeDistance = 0;
            for ($j = 0; $j < $attributeCount; $j++) {
                $positiveDistance += pow($weightedMatrix[$j][$i] - $idealPositive[$j], 2);
                $negativeDistance += pow($weightedMatrix[$j][$i] - $idealNegative[$j], 2);
            }
            $positiveDistances[] = sqrt($positiveDistance);
            $negativeDistances[] = sqrt($negativeDistance);
        }

        // Preferensi relatif
        $preferences = [];
        for ($i = 0; $i < $inputCount; $i++) {
            $preferences[] = $negativeDistances[$i] / ($negativeDistances[$i] + $positiveDistances[$i]);
        }

        // Normalisasi preferensi relatif
        $sumPreferences = array_sum($preferences);
        $normalizedPreferences = [];
        foreach ($preferences as $preference) {
            $normalizedPreferences[] = round($preference / $sumPreferences, 4);
        }

        return view('admin.hasil', [
         'results' => $normalizedPreferences   
        ]);
    }
}
