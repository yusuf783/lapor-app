<?php

namespace App\Filament\Resources\PengaduanResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Pengaduan;
class PengaduanOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengaduan', Pengaduan::count())
            ->icon('heroicon-m-megaphone')
            ->description('Jumlah pengaduan total yang tersimpan')
            ->descriptionIcon('heroicon-m-clipboard-document-list')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('info'),

            Stat::make('Pengaduan Open', Pengaduan::where('status_laporan','open')->count())
            ->icon('heroicon-m-megaphone')
            ->description('Jumlah pengaduan total yang harus di tangani')
            ->descriptionIcon('heroicon-m-clipboard-document')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),

            Stat::make('Pengaduan Selesai', Pengaduan::where('status_laporan','closed')->count())
            ->icon('heroicon-m-megaphone')
            ->description('Jumlah pengaduan total yang sudah di tangani')
            ->descriptionIcon('heroicon-m-clipboard-document-check')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),


        ];
    }
}
