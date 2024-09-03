<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery, WithMapping, ShouldAutoSize
{
    use Exportable;

    public function query()
    {
        return User::query();
    }

    public function map($user): array
    {
        return[
            $user->name,
            $user->email,
            $user->alamat,
            $user->role,

        ];
    }
}
