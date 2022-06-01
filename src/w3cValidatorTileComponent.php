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

        $w3cValidatorStore  = w3cValidatorStore::make();

        $countInfoMessages  = count(array_filter($w3cValidatorStore->getData()['messages'], function($element) {
                                return $element['type']=='info' && $element['subType']!='warning';
                              }));

        $countWarnMessages  = count(array_filter($w3cValidatorStore->getData()['messages'], function($element) {
                                return $element['type']=='info' && $element['subType']=='warning';
                              }));

        $countErrorMessages = count(array_filter($w3cValidatorStore->getData()['messages'], function($element) {
                                return $element['type']=='error';
                              }));


        return view('dashboard-w3c-validator-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),
            'messages'        => $w3cValidatorStore->getData()['messages'],
            'lastUpdateTime'  => date('H:i:s', strtotime($w3cValidatorStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($w3cValidatorStore->getLastUpdateDate())),
            'infoCounter'     => $countInfoMessages,
            'warningCounter'  => $countWarnMessages,
            'errorCounter'    => $countErrorMessages,
        ]);
    }
}
