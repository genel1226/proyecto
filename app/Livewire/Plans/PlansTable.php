<?php

namespace App\Livewire\Plans;

use App\Models\Plans\Plans;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class PlansTable extends PowerGridComponent
{
    public string $tableName = 'plansTable';

    public function setUp(): array
    {
        // $this->showCheckBox();
        Button::add('create-plans');

        return [
            PowerGrid::header()
                ->showToggleColumns()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Plans::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nombre')

           /** Example of custom column using a closure **/
            ->add('nombre_lower', fn (Plans $model) => strtolower(e($model->nombre)))

            ->add('sigla')
            ->add('monto')
            ->add('cantidad_u')
            ->add('lapso')
            ->add('style')
            ->add('paypal_id')
            ->add('stripe_id')
            ->add('tipo')
            ->add('tipo_licencia')
            ->add('created_at_formatted', fn (Plans $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Sigla', 'sigla')
                ->sortable()
                ->searchable(),

            Column::make('Monto', 'monto')
                ->sortable()
                ->searchable(),

            Column::make('Cantidad u', 'cantidad_u'),
            Column::make('Lapso', 'lapso')
                ->sortable()
                ->searchable(),

            Column::make('Style', 'style')
                ->sortable()
                ->searchable(),

            Column::make('Paypal id', 'paypal_id')
                ->sortable()
                ->searchable(),

            Column::make('Stripe id', 'stripe_id')
                ->sortable()
                ->searchable(),

            Column::make('Tipo', 'tipo')
                ->sortable()
                ->searchable(),

            Column::make('Tipo licencia', 'tipo_licencia')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('nombre')->operators(['contains']),
            Filter::inputText('sigla')->operators(['contains']),
            Filter::inputText('lapso')->operators(['contains']),
            Filter::inputText('style')->operators(['contains']),
            Filter::inputText('paypal_id')->operators(['contains']),
            Filter::inputText('stripe_id')->operators(['contains']),
            Filter::inputText('tipo')->operators(['contains']),
            Filter::inputText('tipo_licencia')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Plans $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
