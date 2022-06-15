<?php

namespace App\Exports;

use App\Registro;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class RegistroExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.registros', [
            'registros' => Registro::all()
        ]);
    }

    public function title(): string
    {
        return 'Registros';
    }
}
