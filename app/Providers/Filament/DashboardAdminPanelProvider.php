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

class DashboardAdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('dashboard_admin')
            ->path('dashboard_admin')
            ->login()
            ->registration()
            ->breadcrumbs(false)
            ->colors([
                'primary' => Color::Violet,
            ])
            ->profile()
            ->discoverResources(in: app_path('Filament/DashboardAdmin/Resources'), for: 'App\\Filament\\DashboardAdmin\\Resources')
            ->discoverPages(in: app_path('Filament/DashboardAdmin/Pages'), for: 'App\\Filament\\DashboardAdmin\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/DashboardAdmin/Widgets'), for: 'App\\Filament\\DashboardAdmin\\Widgets')
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
