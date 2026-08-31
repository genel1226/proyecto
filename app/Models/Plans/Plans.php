<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nombre','sigla','monto','cantidad_u','lapso','tipo_licencia','caracteristicas','orden','color_badge','es_personalizable','cantidad_min')]
#[Hidden('paypal_id','stripe_id')]
#[Guarded('id','created_at','updated_at')]

class Plans extends Model
{
    /** @use HasFactory<\Database\Factories\Plans\PlansFactory> */
    use HasFactory;
}
