<?php

namespace App\Exports;

use App\Registro;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;

class RegistroExport implements FromView
{
    use Exportable;

    private $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.registros', [
            'registros' => $this->id ?: Registro::all()
        ]);
    }

    public function title(): string
    {
        return 'Registros';
    }
}
