<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaduanResource\Pages;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns;
use Filament\Tables\Actions;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getWidgets(): array
{
    return [
        PengaduanResource\Widgets\PengaduanOverview::class,
    ];
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Components\Section::make('Form Identitas')
                ->description('Isikan Data dengan benar')
                ->columns(2)
                ->icon('heroicon-o-user')
                ->schema([
                    Components\TextInput::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    ->placeholder('isikan nama pelapor ..')
                    ->required(),
                    Components\TextInput::make('no_hp')
                    ->label('No Hp')
                    ->prefixIcon('heroicon-o-phone')
                    ->numeric()
                    ->required(),
                    Components\TextInput::make('nomor_identitas')
                    ->label('Nomor Identitas')
                    ->prefixIcon('heroicon-o-credit-card')
                    ->placeholder('isikan Nrp/Nim/Nip ..')
                    ->required(),
                    Components\Select::make('status_pelapor')
                    ->label('Status Pelapor')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options([
                        'tendik'=>'Tendik',
                        'dosen'=>'Dosen',
                        'mahasiswa'=>'Mahasiswa',
                    ]),
                ]),
                Components\Section::make('Form Aduan')
                ->description('Isikan data aduan dengan benar')
                ->columns(2)
                ->columnSpan(2)
                ->icon('heroicon-o-megaphone')
                ->schema([
                    Components\TextInput::make('judul_permasalahan')
                    ->label('Judul Permasalahan')
                    ->placeholder('isikan judul permasalahan ..')
                    ->required()
                    ->columnSpan(2),
                    Components\TextInput::make('lokasi_permasalahan')
                    ->label('Lokasi')
                    ->columns(1)
                    ->prefixIcon('heroicon-o-map-pin')
                    ->required(),
                    Components\Select::make('jenis_layanan')
                    ->label('Jenis Layanan')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options([
                        'air'=>'Air',
                        'listrik'=>'Listrik',
                        'komputer'=>'Komputer',
                        'kebersihan'=>'Kebersihan',
                        'internet'=>'Internet',
                        'lainnya'=>'Lainnya'
                    ]),
                    Components\Textarea::make('deskripsi_permasalahan')
                    ->rows(10)
                    ->cols(20)
                    ->required()
                    ->columnSpan(2),
                    Components\FileUpload::make('upload_bukti')
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
                    
                ])

            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->recordClasses(fn (Pengaduan $record) => match ($record->status_laporan) {
                'draft' => 'opacity-30',
                'open' => 'border-s-2 border-orange-600 dark:border-orange-300',
                'published' => 'border-s-2 border-green-600 dark:border-green-300',
                default => null,
            })
            ->columns([
                Columns\ImageColumn::make('upload_bukti')
                ->toggleable(isToggledHiddenByDefault: true), 
                Columns\TextColumn::make('nama_pelapor')
                ->searchable()
                ->toggleable(),
                Columns\TextColumn::make('judul_permasalahan')
                ->searchable()
                ->toggleable(),
                Columns\TextColumn::make('status_pelapor')
                ->toggleable(),
                Columns\TextColumn::make('lokasi_permasalahan')
                ->toggleable(),
                Columns\TextColumn::make('jenis_layanan')
                ->badge()
                ->toggleable(),   
                Columns\TextColumn::make('status_laporan')
                ->toggleable()
                ->badge()
                ->color('info')
                ->color(fn (string $state): string => match ($state) {
                    'open' => 'danger',
                    'process' => 'info',
                    'closed' => 'success',
                })
                ->icon(fn (string $state): string => match ($state) {
                    'open'=>'heroicon-o-clock',
                    'process'=>'heroicon-o-arrow-path',
                    'closed'=>'heroicon-o-x-circle'
                }),
                Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->label('tanggal laporan'),  
            ])
            
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    Actions\Action::make('Status Edit')
                    ->icon('heroicon-o-pencil')
                    ->form([
                        Components\Select::make('status_laporan')
                        ->label('Status Pengaduan')
                        ->options([
                            'open'=>'open',
                            'process'=>'process',
                            'closed'=>'closed'
                        ])
                        ->required(),
                        ])
                        ->action(function (array $data, Pengaduan $record): void {
                            $record->status_laporan = $data['status_laporan'];
                            $record->save();
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
             RelationManagers\DetailPengaduanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
