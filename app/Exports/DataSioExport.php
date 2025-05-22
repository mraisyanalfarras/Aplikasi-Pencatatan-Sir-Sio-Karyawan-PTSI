<?php

namespace App\Exports;

use App\Models\DataSio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSioExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DataSio::select([
            'nik', 'name', 'position', 'no_sio',
            'type_sio', 'class', 'expire_date', 'status', 'reminder',
            'location', 'foto', 'created_at', 'updated_at'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'NIK', 'Nama', 'Posisi', 'No SIO',
            'Tipe SIO', 'Kelas', 'Tanggal Expired', 'Status',
            'Reminder', 'Lokasi', 'Foto', 'Dibuat Pada', 'Diperbarui Pada'
        ];
    }
}
