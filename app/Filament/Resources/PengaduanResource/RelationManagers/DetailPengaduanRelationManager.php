<?php

namespace App\Filament\Resources\PengaduanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPengaduanRelationManager extends RelationManager
{
    protected static string $relationship = 'detailPengaduan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status_laporan')
                        ->label('Status Pengaduan')
                        ->options([
                            'open'=>'open',
                            'process'=>'process',
                            'closed'=>'closed'
                        ])
                ->required(),
                Forms\Components\TextInput::make('catatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto_balasan')
                    ->required()
                    ->directory('upload_bukti')
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->imagePreviewHeight('250')
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('2:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->required()
                  
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('catatan')
            ->columns([
                Tables\Columns\TextColumn::make('catatan')
                ->label('catatan'),
                Tables\Columns\ImageColumn::make('foto_balasan')

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $pengaduan = $this->ownerRecord;
                        
                        $pengaduan->update(['status_laporan' => $data['status_laporan']]);
                    
                        $data['user_id'] = auth()->user()->id;
                        
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                        ->mutateFormDataUsing(function (array $data): array {
                        $pengaduan = $this->ownerRecord;
                        
                        $pengaduan->update(['status_laporan' => $data['status_laporan']]);
                    
                        $data['user_id'] = auth()->user()->id;
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
