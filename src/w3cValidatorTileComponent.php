<?php

namespace Quarterloop\w3cValidatorTile;

use Livewire\Component;

class w3cValidatorTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

        $w3cValidatorStore = w3cValidatorStore::make();

        return view('dashboard-dns-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),
            // 'aRecords'        => $w3cValidatorStore->getData()['a'],
            'lastUpdateTime'  => date('H:i:s', strtotime($w3cValidatorStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($w3cValidatorStore->getLastUpdateDate())),
        ]);
    }
}
