<?php

namespace App\Http\Substructure\Repositories;


use App\Http\Substructure\Resources\CardapioResource;
use App\Models\Cardapio;
use Illuminate\Support\Facades\Storage;


class CardapioRepository  extends BaseRepository{

    protected $model = Cardapio::class;
    protected $resource = CardapioResource::class;

    public function __construct(Cardapio $cardapio)
    {
       $this->cardapio = $cardapio;
    }


    public function list()
    {
        $list = parent::list();
        foreach ($list as $item) {
            try {

                $file = Storage::disk('local')->get($item->foto);
                $item->foto = base64_encode($file);
            } catch (\Exception $ex) {
                $item->foto = null;
            }
        }



        return CardapioResource::collection($list);
    }


    public function store($values = null)
    {
        $base = explode(';', $values["foto"]);
        if (count($base) > 1) {
            $values["foto"] = str_replace('base64,', '', $base[1]);
        }
        $path = now()->timestamp . $values["titulo"];
        $file = Storage::disk("local")->put($path, base64_decode($values["foto"]));
        $values["foto"] = $path;
        return new CardapioResource($this->cardapio->create($values));
    }


    public function find($id)
    {
        if(request()['with']){
            $cardapio =  $this->model::with(request()['with'])->find($id);
        }else{
            $cardapio = $this->model::find($id);
        }
        $cardapio = $this->getImage($cardapio);
        return new $this->resource($cardapio);
    }



    public function update(array $values, $id)
    {
        $base = explode(';', $values["foto"]);
        if (count($base) > 1) {
            $values["foto"] = str_replace('base64,', '', $base[1]);
        }
        $path = now()->timestamp . $values["titulo"];
        $file = Storage::disk("local")->put($path, base64_decode($values["foto"]));
        $values["foto"] = $path;

        return parent::update($values,$id);
    }


    public function getImage($item){
        try {
            $file = Storage::disk('local')->get($item->foto);
            $item->foto = base64_encode($file);

        } catch (\Exception $ex) {
            $item->foto = null;

        }
        return $item;
    }


}

?>
