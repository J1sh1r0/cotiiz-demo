<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Logic to reset the database
        return 0;
    }
}

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Los comandos Artisan disponibles en la aplicación.
     */
    protected $commands = [
        \App\Console\Commands\ResetDatabase::class, // Agregamos el comando reset-demo
    ];

    /**
     * Define el programador de tareas Artisan.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Puedes agregar tareas programadas aquí si lo necesitas.
    }

    /**
     * Registra los comandos personalizados de Artisan.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
