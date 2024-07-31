<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MollieTaxReportResource\Pages;
use App\Filament\Resources\MollieTaxReportResource\RelationManagers;
use App\Models\TransactionTax;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MollieTaxReportResource extends Resource
{
    protected static ?string $model = TransactionTax::class;

    protected static ?string $navigationLabel = 'Taxes Report';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Mollie payment';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transaction_count')
                    ->summarize(Count::make()->label(''))
                    ->label('Transactions')
                    ->alignCenter(),
                TextColumn::make('rate')
                    ->summarize(Average::make()->label('')->formatStateUsing(fn ($state) => $state / 100))
                    ->label('Rate')
                    ->alignCenter(),
                TextColumn::make('transaction_sum_amount')
                    ->summarize(Sum::make()->label('')->formatStateUsing(fn ($state) => $state / 100))
                    ->label('Taxable Amount')
                    ->alignCenter(),
                TextColumn::make('amount')
                    ->summarize(Sum::make()->label('')->formatStateUsing(fn ($state) => $state / 100))
                    ->label('Tax Amount')
                    ->alignCenter(),
            ])
            ->defaultGroup(Group::make('country')->titlePrefixedWithLabel(false),)
            ->groupingSettingsHidden()
            ->groupsOnly()
            ->filters([
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withCount('transaction')
                ->withSum('transaction', 'amount')
            );
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMollieTaxReports::route('/'),
        ];
    }
}
