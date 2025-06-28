<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ApiTable extends PowerGridComponent
{
    public string $tableName = 'api-table-0iygqo-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('api_data')->whereNot('fcer', 1);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('rg')
            ->add('name')
            ->add('iok')
            ->add('ref')
            ->add('amount')
            ->add('fcer')
            ->add('datecer_formatted', fn ($model) => Carbon::parse($model->datecer)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('#', 'id'),
            // Column::make(__('Rg'), 'rg')
            //     ->sortable()
            //     ->searchable(),

            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),

            Column::make(__('Iok'), 'iok')
                ->sortable()
                ->searchable(),

            Column::make(__('Ref'), 'ref')
                ->sortable()
                ->searchable(),

            Column::make(__('Amount'), 'amount')
                ->sortable()
                ->searchable(),

            // Column::make(__('Fcer'), 'fcer')
            //     ->sortable()
            //     ->searchable(),

            Column::make(__('Datecer'), 'datecer_formatted', 'datecer')
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('datecer'),
        ];
    }
}
