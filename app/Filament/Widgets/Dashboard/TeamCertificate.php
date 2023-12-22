<?php

namespace App\Filament\Widgets\Dashboard;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TeamCertificate extends BaseWidget
{


    protected function getCards(): array
    {
        $CERTIFICATE_LIST_URL = 'admin/my-profile';

        $color;

        $description;

        return [
            Card::make('Certificates','')
            ->url($CERTIFICATE_LIST_URL)
            ->color('danger')
            ->description('Please complete your profile to use the system')
            ->descriptionIcon('heroicon-o-user')
            ->label('Complete your profile'),

        ];
    }
}
