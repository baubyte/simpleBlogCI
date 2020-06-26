<?php namespace App\Models;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
        /**ombre de la Tabla */
        protected $table      = 'newsletter';
        /**Clave Primaria de la Tabla */
        protected $primaryKey = 'id';
        /**Lo que va a Devolver Cuando seleccionemos el Modelo */
        protected $returnType = 'array';
        /**Activamos el SoftDelete */
        protected $useSoftDeletes = true;

        protected $allowedFields = ['email'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        
        protected $skipValidation     = false;
} 