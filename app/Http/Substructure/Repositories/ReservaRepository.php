<?php

namespace App\Http\Substructure\Repositories;
use App\Http\Substructure\Resources\ReservaResource;

use App\Models\Reserva;


class ReservaRepository  extends BaseRepository{

    protected $model = Reserva::class;
    protected $orderBy = "contato";
    protected $resource = ReservaResource::class;

    public function __construct(Reserva $reserva)
    {
       $this->reserva = $reserva;
    }



}

?>
