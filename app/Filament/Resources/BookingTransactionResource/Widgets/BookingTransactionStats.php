<?php

namespace App\Filament\Resources\BookingTransactionResource\Widgets;

use App\Models\BookingTransaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingTransactionStats extends BaseWidget
{
    protected function getStats(): array
    {

        $totalTransactions = BookingTransaction::count();
        $approvedTransactions = BookingTransaction::where('is_paid', true)->count();
        $totalRevenue = BookingTransaction::where('is_paid', true)->sum('total_amount');

        return [
            Stat::make('Total Transaction', $totalTransactions)
                ->description('All Transactions')
                ->descriptionIcon('heroicon-o-currency-dollar'),
            Stat::make('Approved Transaction', $approvedTransactions)
                ->description('Approved Transactions')
                ->descriptionIcon('heroicon-o-check-circle'),
            Stat::make('Total Revenue', 'IDR ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Revenue from Approved Transactions')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success')
        ];
    }
}
