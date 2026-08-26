<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nombre','sigla','monto','cantidad_u','lapso','style','paypal_id','stripe_id','tipo','tipo_licencia')]
#[Hidden('color_badge','es_personalizable','cantidad_min','caracteristicas','orden')]

class Plans extends Model
{
    /** @use HasFactory<\Database\Factories\Plans\PlansFactory> */
    use HasFactory;
}
