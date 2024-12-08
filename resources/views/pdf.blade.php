<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print IRS</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            line-height: 1.6;
        }

        .header,
        .footer {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        #pengampu{
            text-align: left;
        }

        th,
        td {
            
        }

        .time{ margin-bottom: -20px;
        font-size: 10px;
        color: gray;
        }
    </style>
</head>

<body>
    <div class="timestamp">
        {{ \Carbon\Carbon::now()->format('d/m/Y, H:i:s') }}
    </div>

    <div class="header">
        <h3>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</h3>
        <h4>FAKULTAS SAINS DAN MATEMATIKA</h4>
        <h4>UNIVERSITAS DIPONEGORO</h4>
        <h2>ISIAN RENCANA STUDI</h2>
        <p>Semester Ganjil TA 2024/2025</p>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
        <div style="flex: 1;">
            <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p><strong>Nama Mahasiswa:</strong> {{ $mahasiswa->nama }}</p>
            <p><strong>Program Studi:</strong> {{ $mahasiswa->jurusan }}</p>
            <p><strong>Dosen Wali:</strong> {{ $mahasiswa->pembimbing_akademik}}</p>
        </div>

        <div style=" 20px; text-align: right; display: flex; justify-content: flex-end;">
            <img src="{{ $image }}" alt="User Photo"
                style="width: 90px; height: 120px; object-fit: cover; border: 1px solid #000;">
        </div>
    </div>

    <table class="text-center">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">KodeMK</th>
                <th class="text-center">Mata Kuliah</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">SKS</th>
                <th class="text-center">Ruang</th>
                <th class="text-center">Status</th>
                <th class="text-center">Nama Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($irsData as $index => $irs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $irs->kodemk }}</td>
                    <td>{{ $irs->matakuliah->nama }}</td>
                    <td>{{ $irs->kelas }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($irs->jam_mulai)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($irs->jam_selesai)->format('H:i') }}
                    </td>
                    <td>{{ $irs->sks }}</td>
                    <td>{{ $irs->ruang }}</td>
                    <td>{{ $irs->status_mk }}</td>
                    <td id="pengampu">
                        {{ $irs->pengampu_1 }}
                        <br>
                        {{ $irs->pengampu_2 }}
                        <br>
                        {{ $irs->pengampu_3 }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    </div>

</body>

</html>
