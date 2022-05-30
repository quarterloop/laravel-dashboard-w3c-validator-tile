<?php

namespace Quarterloop\DNSTile;

use Spatie\Dashboard\Models\Tile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class w3cValidatorStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("w3cValidator");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('w3cValidator', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('w3cValidator') ?? [];
    }

    public function getLastUpdateTime()
    {
        $tileName = 'w3cValidator';

        $queryTime = DB::table('dashboard_tiles')->select('updated_at')->where('name', '=', $tileName)->get();

        $responseTime = Str::substr($queryTime, 26, 9);

        return $responseTime;
    }

    public function getLastUpdateDate()
    {
        $tileName = 'w3cValidator';

        $queryDate = DB::table('dashboard_tiles')->select('updated_at')->where('name', '=', $tileName)->get();

        $responseDate = Str::substr($queryDate, 16, 10);

        return $responseDate;
    }
}
