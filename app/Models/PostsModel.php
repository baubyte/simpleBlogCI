<?php namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
        /**Nombre de la Tabla */
        protected $table      = 'posts';
        /**Clave Primaria de la Tabla */
        protected $primaryKey = 'id';
        /**Lo que va a Devolver Cuando seleccionemos el Modelo */
        protected $returnType = 'array';
        /**Activamos el SoftDelete */
        protected $useSoftDeletes = true;

        protected $allowedFields = ['banner', 'title','slug','intro','content','category','tags','created_by'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        /**Para las Validaciones */
        protected $validationRules    = [
        ];
        /**Para Mostrar los Mensajes de Errores */
        protected $validationMessages = [
        ];
        protected $skipValidation     = false;
} 