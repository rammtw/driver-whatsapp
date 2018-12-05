<?php

namespace BotMan\Drivers\Whatsapp\Providers;

use App\WhatsApp\WhatsappDriver;
use BotMan\Studio\Providers\StudioServiceProvider;
use Illuminate\Support\ServiceProvider;
use BotMan\BotMan\Drivers\DriverManager;

class WhatsappServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->isRunningInBotManStudio()) {
            $this->loadDrivers();
        }
    }
    /**
     * Load BotMan drivers.
     */
    protected function loadDrivers()
    {
        DriverManager::loadDriver(WhatsappDriver::class);
    }
    /**
     * @return bool
     */
    protected function isRunningInBotManStudio()
    {
        return class_exists(StudioServiceProvider::class);
    }
}