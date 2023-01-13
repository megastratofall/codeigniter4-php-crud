<?php

namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model
{
	protected $table = 'libros';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nombre', 'autor', 'fecha_de_edicion'];
}
