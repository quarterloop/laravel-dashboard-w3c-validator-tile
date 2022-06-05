<?php

namespace Quarterloop\w3cValidatorTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\w3cValidatorTile\Services\w3cValidatorAPI;
use Quarterloop\w3cValidatorTile\w3cValidatorStore;
use Session;

class Fetchw3cValidatorCommand extends Command
{
    protected $signature = 'dashboard:fetch-w3c-validator-data';

    protected $description = 'Fetch w3c validator data';

    public function handle(w3cValidatorAPI $w3c_validator_api)
    {

        $this->info('Fetching w3c validator data ...');

        $w3c_validator = $w3c_validator_api::getW3cValidator(
            Session::get('website'),
        );

        w3cValidatorStore::make()->setData($w3c_validator);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
