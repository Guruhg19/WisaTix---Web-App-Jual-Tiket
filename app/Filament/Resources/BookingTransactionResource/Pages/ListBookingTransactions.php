<?php

namespace App\Filament\Resources\BookingTransactionResource\Pages;

use App\Filament\Resources\BookingTransactionResource;
use App\Filament\Resources\BookingTransactionResource\Widgets\BookingTransactionStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookingTransactions extends ListRecords
{
    protected static string $resource = BookingTransactionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            BookingTransactionStats::class
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
