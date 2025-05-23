<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use App\Filament\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
class EditPengaduan extends EditRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ,
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

protected function getSavedNotification(): ?Notification
{
    return Notification::make()
        ->success()
        ->title('Pengaduan Update')
        ->body('Pengaduan berhasil di update');
}

     protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),
      
        ];
    }
}
