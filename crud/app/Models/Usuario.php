<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string|null $nome
 * @property string|null $pass
 * @property string|null $organizacao
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'pass',
		'organizacao'
	];
}
