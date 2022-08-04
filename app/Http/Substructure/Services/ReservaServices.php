<?php

namespace App\Http\Substructure\Services;


use App\Http\Substructure\Repositories\ReservaRepository;
use App\Models\Reserva;


class ReservaServices  extends BaseServices
{


    public function __construct(Reserva $reserva, ReservaRepository $reserva_repository)
    {
        $this->reserva = $reserva;
        $this->reserva_repository = $reserva_repository;
    }

}
