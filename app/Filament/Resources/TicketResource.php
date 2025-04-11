<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ticket;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TicketResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TicketResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Details')
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                    Textarea::make('address')
                    ->rows(3)
                    ->required()
                    ->maxLength(255),

                    FileUpload::make('thumbnail')
                    ->image()
                    ->required(),

                    Repeater::make('photos')
                    ->relationship('photos')
                    ->schema([
                        FileUpload::make('photo')
                        ->image()
                        ->required()
                    ])
                    ]),

                Fieldset::make('Additional')
                ->schema([
                    RichEditor::make('about')
                    ->required(),

                    TextInput::make('path_video')
                    ->required()
                    ->maxLength(255),

                    TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),

                    Select::make('is_popular')
                    ->options([
                        true => 'Popular',
                        false => 'Not Popular'
                    ]),

                    Select::make('category_id')
                    ->relationship('category','name')
                    ->searchable()
                    ->preload()
                    ->required(),

                    Select::make('seller_id')
                    ->relationship('seller','name')
                    ->searchable()
                    ->preload()
                    ->required(),

                    TimePicker::make('open_time_at')
                    ->required(),

                    TimePicker::make('close_time_at')
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),

                TextColumn::make('category.name'),

                ImageColumn::make('thumbnail'),

                IconColumn::make('is_popular')
                ->boolean()
                ->trueColor('success')
                ->falseColor('danger')
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->label('Popular')


            ])
            ->filters([
                SelectFilter::make('category_id')
                ->label('category')
                ->relationship('category','name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
