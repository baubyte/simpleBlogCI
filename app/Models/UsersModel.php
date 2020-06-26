<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
        /**ombre de la Tabla */
        protected $table      = 'users';
        /**Clave Primaria de la Tabla */
        protected $primaryKey = 'id';
        /**Lo que va a Devolver Cuando seleccionemos el Modelo */
        protected $returnType = 'array';
        /**Activamos el SoftDelete */
        protected $useSoftDeletes = true;

        protected $allowedFields = ['name', 'username','password','role','last_login'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        /**Para las Validaciones */
        protected $validationRules    = [
                'name'=>'required|alpha_numeric_space|min_length[3]',
                //'username'=>'required|valid_email|is_unique[users.email]'
        ];
        /**Para Mostrar los Mensajes de Errores */
        protected $validationMessages = [
                'username'=>[
                        'is_unique'=>'El Email Ingresado ya Existe'
                ]
        ];
        protected $skipValidation     = false;
} 