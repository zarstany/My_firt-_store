<?php
namespace App\UseCases;

use App\Repositories\EloquentUserProfileRepository;
use App\Repositories\EloquentUserRepository;

class RegisterUserUseCase
{
    public function execute(string $name, string $email, string $password): void
    { 
        //Instanciar al repositorio 
    $eloquentUserRepository = new EloquentUserRepository();
     //Crear el usuario y almacenarlo en una variable llamada $user
    $user = $eloquentUserRepository->store($name, $email, $password);
        //Crear el UserProfile

        //instanciamos el repositorio del userProfile
    $eloquentUserProfileRepository = new EloquentUserProfileRepository();
        //Creamos el perfil del usuario que le asignara los permisos de cliente
    $eloquentUserProfileRepository->store($user->id);

    }
    
}