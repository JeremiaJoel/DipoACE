<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\khs;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IRSController extends Controller
{
    public function index()
    {
        // Ambil data jadwal dari database
        $jadwals = Jadwal::paginate(10);

        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();
        $nim = $mahasiswa ? $mahasiswa->nim : null;
        $sksLoad = $this->calculateSKSLoad($nim);

        // Kirim data ke view
        return view('mahasiswa-buatirs', compact('jadwals', 'sksLoad'));
    }


    // Method untuk menangani tombol "Ambil"
    public function ambil(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        $sksLoad = $this->calculateSKSLoad($mahasiswa->nim);

        // Check if the current SKS load plus the new course's SKS exceeds the limit
        if (($mahasiswa->current_sks + $jadwal->sks) > $sksLoad) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Exceeds the SKS limit'], 422);
            }
            return back()->withErrors('Exceeds the SKS limit');
        }

        // Proceed with enrollment
        $mahasiswa->current_sks += $jadwal->sks;
        $mahasiswa->save();
        $jadwal->status = 'Diambil';
        $jadwal->save();

        if ($request->ajax()) {
            return response()->json(['success' => 'Course successfully taken']);
        }
        return back()->with('success', 'Course successfully taken');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $jadwals = Jadwal::whereHas('matakuliah', function ($q) use ($query) {
            $q->where('nama', 'like', '%' . $query . '%');
        })
        ->orWhere('kodemk', 'like', "%{$query}%")
        ->with('matakuliah')
        ->get();
    
        if ($request->ajax()) {
            return response()->json($jadwals);
        }
    
        return view('mahasiswa.buatirs', compact('jadwals'));
    }
    

    public function calculateSKSLoad($nim)
    {

        $currentSemester = Mahasiswa::where('nim', $nim)->first()->semester ?? null;

        if (!$currentSemester) {
            return null;
        }

        $khsRecords = KHS::where('nim', $nim)->where('semester', $currentSemester)->get();

        $totalSKS = $khsRecords->sum('sks');
        $totalPoints = $khsRecords->reduce(function ($carry, $item) {
            return $carry + ($item->sks * $this->getGradePoints($item->nilai_huruf));
        }, 0);

        $ipSemester = $totalSKS > 0 ? round($totalPoints / $totalSKS, 2) : 0;

        return $this->determineSKSLoadBasedOnIP($ipSemester);
    }

    protected function getGradePoints($grade)
    {
        $gradePoints = [
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            'E' => 0
        ];

        return $gradePoints[$grade] ?? 0;
    }

    protected function determineSKSLoadBasedOnIP($ip)
    {
        if ($ip >= 3.0) {
            return 24;
        } elseif ($ip >= 2.5) {
            return 20;
        } else {
            return 18;
        }
    }
}
