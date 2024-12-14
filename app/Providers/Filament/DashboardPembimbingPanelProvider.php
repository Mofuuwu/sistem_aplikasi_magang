<?php

namespace App\Providers\Filament;

use App\Http\Middleware\RoleRedirect;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class DashboardPembimbingPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('dashboard_pembimbing')
            ->path('dashboard_pembimbing')
            ->login()
            ->registration()
            ->colors([
                'primary' => Color::Violet,
            ])
            ->profile()
            ->discoverResources(in: app_path('Filament/DashboardPembimbing/Resources'), for: 'App\\Filament\\DashboardPembimbing\\Resources')
            ->discoverPages(in: app_path('Filament/DashboardPembimbing/Pages'), for: 'App\\Filament\\DashboardPembimbing\\Pages')
            ->pages([
                Pages\Pembimbing_Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/DashboardPembimbing/Widgets'), for: 'App\\Filament\\DashboardPembimbing\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                RoleRedirect::class
            ]);
    }
}
