<?php

namespace App\Livewire\Plans;

use Livewire\Component;

class Plans extends Component
{
    public $nombre;
    public $sigla;
    public $monto;
    public $cantidad_u;
    public $lapso;
    public $tipo_licencia;
    public $caracteristicas;
    public $orden;
    public $color_badge = '#000000';
    public $es_personalizable;
    public $cantidad_min;

    public function store(){
        $plans = new Plans();
        dd(
        $plans->nombre = $this->nombre,
        $plans->sigla = $this->sigla,
        $plans->monto = $this->monto,
        $plans->cantidad_u = $this->cantidad_u,
        $plans->lapso = $this->lapso,
        $plans->tipo_licencia = $this->tipo_licencia,
        $plans->caracteristicas = $this->caracteristicas,
        $plans->orden = $this->orden,
        $plans->color_badge = $this->color_badge,
        $plans->es_personalizable = $this->es_personalizable,
        $plans->cantidad_min = $this->cantidad_min,
        );

        redirect()->route('plans');
    }


    public function render()
    {
        return view('livewire.plans.plans');
    }
}
