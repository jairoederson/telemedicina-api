<?php

namespace App\Usuario;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  // constantes
  // const USUARIO_VERIFICADO = '0';
  // const USUARIO_NO_VERIFICADO = '1';
  const USUARIO_ADMINISTRADOR = '0';
  const USUARIO_PACIENTE = '1';
  const USUARIO_DOCTOR = '2';


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'father_lastname',
      'mother_lastname',
      'last_login',
      'gender',
      'state',
      'address',
      'postal',
      'state',
      'terminal',
      'terminal_upd',
      'ubigeo_id',
      'user_sinch',
      'password_sinch',
      'email',
      'password',
      'verified',
      'verification_token',
      'admin',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password',
      'remember_token',
      'verification_token'
  ];

  // metodos
  // public function esVerificado()
  // {
  //     return $this->verified == User::USUARIO_VERIFICADO;
  // }

  public function esAdministrador()
  {
    return $this->admin == User::USUARIO_ADMINISTRADOR;
  }

  public function esDoctor()
  {
    return $this->admin == User::USUARIO_DOCTOR;
  }

  public function esPaciente()
  {
    return $this->admin == User::USUARIO_PACIENTE;
  }

  public function generarVerificationToken()
  {
    return str_random(40);
  }
}
