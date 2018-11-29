<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vistoria
 * @package App\Models
 * @version October 28, 2018, 2:15 am UTC
 */
class Vistoria extends Model
{
    

    public $table = 'vistorias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'data_abordagem',
        'tipo_abordagem',
        'nomes_pessoas',
        'quantidade_pessoas',
        'casal',
        'nivel_complexidade',
        'classificacao',
        'num_reduzido',
        'catador_reciclados',
        'resistencia',
        'fixacao_antiga',
        'estrutura_abrigo_provisorio',
        'excesso_objetos',
        'trafico_ilicitos',
        'menores_idosos',
        'deficiente',
        'agrupamento_quimico',
        'saude_mental',
        'animais',
        'e1',
        'e2',
        'e3',
        'e4',
        'material_apreendido',
        'material_descartado',
        'tipo_abrigo_desmontado',
        'qtd_kg',
        'resultado_acao',
        'movimento_migratorio',
        'observacao',
        'ponto_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'data_abordagem' => 'string',
        'nomes_pessoas' => 'string',
        'quantidade_pessoas' => 'string',
        'casal' => 'string',
        'nivel_complexidade' => 'string',
        'classificacao' => 'string',
        'num_reduzido' => 'string',
        'catador_reciclados' => 'string',
        'resistencia' => 'string',
        'fixacao_antiga' => 'string',
        'estrutura_abrigo_provisorio' => 'string',
        'excesso_objetos' => 'string',
        'trafico_ilicitos' => 'string',
        'menores_idosos' => 'string',
        'deficiente' => 'string',
        'agrupamento_quimico' => 'string',
        'saude_mental' => 'string',
        'animais' => 'string',
        'e1' => 'string',
        'e2' => 'string',
        'e3' => 'string',
        'e4' => 'string',
        'material_apreendido' => 'string',
        'material_descartado' => 'string',
        'tipo_abrigo_desmontado' => 'string',
        'qtd_kg' => 'string',
        'resultado_acao' => 'string',
        'movimento_migratorio' => 'string',
        'observacao' => 'string',
        'ponto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public  function ponto(){
    	return $this->belongsTo(Ponto::class);
    }

    
}
