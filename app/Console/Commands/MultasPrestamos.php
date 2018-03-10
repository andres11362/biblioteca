<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Prestamo;
use Carbon\Carbon;

class MultasPrestamos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prestamos:multas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar prestamos que estan vencidos y aplicar una multa respectiva';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $prestamos = Prestamo::all();

        foreach($prestamos as $prestamo)
        {
            if($prestamo->estado == 1){
                if(Carbon::now() >= $prestamo->fecha_fin){
                    $prestamo->estado = Prestamo::ESTADO_MULTA;
                    $prestamo->save();
                }
            }
        }
    }
}
