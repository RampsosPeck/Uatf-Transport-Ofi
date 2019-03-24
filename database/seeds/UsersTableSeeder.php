<?php

use Illuminate\Database\Seeder;
use UatfTransport\User;
use UatfTransport\Cuenta; 
use UatfTransport\Tarjeta;
use UatfTransport\Transaction;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->entity = "Ingeniero de Sistemas";
        $admin->name = "Ing. Jorge Denys Peralta M.";
        $admin->cedula = "10519606";
        $admin->phone= "75729198";
        $admin->genero= "masculino";
        $admin->ru= "56930";
		$admin->email= "peralta.jorge.uatf@gmail.com";
		$admin->password= bcrypt('123456');
        $admin->active = true;
        $admin->type = 'Administrator'; 
		$admin->save();

        $admincu = new Cuenta;
        $admincu->QRcode = bcrypt('123456');
        $admincu->saldo = 20;
        $admincu->user_id = 1;
        $admincu->save();

        $admintar = new Tarjeta;
        $admintar->code = '1/18';
        $admintar->barCode = '1/18'. '-' . str_random(5) . '-' . 1 . '-' . 1 . '/' . date('d-m-y');
        $admintar->user_id = 1;
        $admintar->cuenta_id = 1; 
        $admintar->save(); 

        $admintran = new Transaction;
        $admintran->cuenta_id = 1;
        $admintran->monto = 20;
        $admintran->haber = 0;
        $admintran->tipo = 'Crédito'; 
        $admintran->servicio = 'recargue'; 
        $admintran->save();
    }
}
