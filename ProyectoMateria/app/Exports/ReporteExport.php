
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Reporte;

class ReporteExport implements FromCollection, WithHeadings
{
    protected $reporte;

    public function __construct(Reporte $reporte)
    {
        $this->reporte = $reporte;
    }

    public function collection()
    {
        return collect([
            [
                'ID' => $this->reporte->id_reporte,
                'Fecha' => $this->reporte->created_at->format('d/m/Y H:i'),
                'Usuario' => $this->reporte->usuario->nombre,
                'Tipo' => ucfirst($this->reporte->tipo_reporte),
                'Estado' => ucfirst($this->reporte->estado_reporte),
                'Título' => $this->reporte->titulo_reporte,
                'Contenido' => $this->reporte->contenido_reporte
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Fecha',
            'Usuario',
            'Tipo',
            'Estado',
            'Título',
            'Contenido'
        ];
    }
}