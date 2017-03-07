<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TOperador extends Model
{
	protected $table='toperador';
	protected $primaryKey='idOperador';
	public $incrementing=true;
	public $timestamps=false;

	public function tTelefono()
	{
		return $this->hasMany('App\Model\TTelefono', 'idOperador');
	}
}
?>