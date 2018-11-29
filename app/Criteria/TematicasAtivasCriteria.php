<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class TematicasAtivasCriteria
 * @package namespace App\Criteria;
 */
class TematicasAtivasCriteria implements CriteriaInterface
{

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('Sit_Tema','=', 'A' );
        $model = $model->orderBy('Des_Tema');
        return $model;
    }
}
