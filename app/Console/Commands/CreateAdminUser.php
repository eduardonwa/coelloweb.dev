<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin
                            {email? : Correo}
                            {--name= : Nombre (default: "Admin")}
                            {--password= : Contraseña opcional (se generará aleatoriamente si presionas ENTER)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea el usuario administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // crear rol de admin si no existe
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
            $this->info('Rol admin creado automáticamente.');
        } 

        // obtener datos
        $name = $this->option('name') ?? $this->ask('Nombre para el usuario', 'Admin');
        $email = $this->argument('email') ?? $this->ask('Ingresa un correo electrónico válido');
        // validar email
        $validator = Validator::make(
            ['email' => $email], [
            'email' => 'required|email|unique:users,email'
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return 1;
        }

        // obtener o solicitad contraseña
        $password = $this->option('password') ?? $this->secret('Contraseña: (dejar vacío si quieres generar uno aleatorio)');
        // generar la contraseña aleatoriamente
        $password = $password ?: Str::random(12);

        $this->table(
            ['Field', 'Value'],
            [
                ['Name', $name],
                ['Email', $email],
                ['Password', $password ? '*****' : 'Creado aleatoriamente']
            ]
        );

        if (!$this->confirm('¿Crear este usuario admin?')) {
            $this->info('Registro cancelado.');
            return 0;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'email_verified_at' => now()
        ]);

        $user->assignRole('admin');

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        $this->info("✅ Admin creado exitosamente.");
        $this->info("✅ Tu correo ya ha sido verificado.");
        $this->line("Name: {$name}");
        $this->line("Email: {$email}");
        $this->line("Password: {$password}");

        return 0;
    }
}
