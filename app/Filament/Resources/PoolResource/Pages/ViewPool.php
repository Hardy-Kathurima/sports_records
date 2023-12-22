<?php

namespace App\Filament\Resources\PoolResource\Pages;

use App\Filament\Resources\PoolResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPool extends ViewRecord
{
    protected static string $resource = PoolResource::class;
    protected static string $view = 'filament.pages.pool';


    public function mount($record):void {
        parent::mount($record);

        

    }
}
