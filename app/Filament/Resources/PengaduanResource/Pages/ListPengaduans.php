<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use App\Filament\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPengaduans extends ListRecords
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            PengaduanResource\Widgets\PengaduanOverview::class,
        ];
    }

    public function getTabs(): array
{
    return [
        'all' => Tab::make(),
        'listrik' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis_layanan', 'listrik')),
        'air' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis_layanan', 'air')),
        'kebersihan' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis_layanan', 'kebersihan')),
        'internet' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis_layanan', 'internet')),
        'komputer' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis_layanan', 'komputer')),
        'lainnya' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis_layanan', 'lainnya')),
    ];
}
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
