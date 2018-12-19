<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVistoriaRequest;
use App\Http\Requests\UpdateVistoriaRequest;
use App\Models\Ponto;
use App\Repositories\PontoRepository;
use App\Repositories\VistoriaRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
class VistoriaController extends AppBaseController
{
    private $vistoriaRepository;
    private $ponto;
    private $resultados_acoes;
    private $tipo_abordagem;
    private $encaminhamentos;

	public function __construct(VistoriaRepository $vistoriaRepo, PontoRepository $pontoRepository)
    {
        $this->vistoriaRepository = $vistoriaRepo;
        $this->ponto = $pontoRepository;
        $this->resultados_acoes = DB::table('resultados_acoes')->pluck('resultado','id');
        $this->tipo_abordagem = DB::table('tipo_abordagem')->pluck('tipo','id');
        $this->encaminhamentos = DB::table('encaminhamentos')->pluck('encaminhamento');

    }

    public function index(Request $request)
    {
    	$logradouro = $request->logradouro;
    	$numero = $request->numero;
		$vistorias = $this->vistoriaRepository->buscar($request);
        return view('vistorias.index',compact('vistorias','logradouro','numero'));
    }

    public function create()
    {
        $resultados_acoes = $this->resultados_acoes;
        $tipo_abordagem = $this->tipo_abordagem;
        $tipo_abordagem = $this->tipo_abordagem;
        $encaminhamentos = $this->encaminhamentos;

        return view('vistorias.create',compact('resultados_acoes','tipo_abordagem','tipo_abordagem','encaminhamentos'));
    }

    public function createDetail($id){
		$ponto = $this->ponto->find($id);
	    return view('vistorias.create',compact('ponto'));
    }

    public function store(CreateVistoriaRequest $request)
    {
        $input = $request->all();
	    $dt = $input['data_abordagem'];
        $input['data_abordagem'] = $this->dtus($dt);
        $vistoria = $this->vistoriaRepository->create($input);
        return redirect(route('vistorias.index'));
    }

    public function show($id)
    {
	    $vistoria = $this->vistoriaRepository->visualizar($id);


        if (empty($vistoria)) {
            Flash::error('Vistoria not found');

            return redirect(route('vistorias.index'));
        }
        return view('vistorias.show',compact('vistoria'));
    }

    public function edit($id)
    {
        $resultados_acoes = $this->resultados_acoes;
        $encaminhamentos = $this->encaminhamentos;
        $tipo_abordagem = $this->tipo_abordagem;
        $encaminhamentos = $this->encaminhamentos;



        $vistoria = $this->vistoriaRepository->findWithoutFail($id);
        $vistoria->data_abordagem = $this->toBR($vistoria->data_abordagem);
        $ponto_id = $vistoria->ponto_id;
        $ponto = $this->ponto->find($ponto_id);



        if (empty($vistoria)) {
            Flash::error('Vistoria não encontrada');

            return redirect(route('vistorias.index'));
        }
        
        return view('vistorias.edit',compact('vistoria','ponto','ponto_concat','resultados_acoes'));
    }


    public function update($id, UpdateVistoriaRequest $request)
    {
        $vistoria = $this->vistoriaRepository->findWithoutFail($id);

        if (empty($vistoria)) {
            Flash::error('Vistoria not found');

            return redirect(route('vistorias.index'));
        }

        $request['data_abordagem'] = $this->dtus($request->data_abordagem);

        $vistoria = $this->vistoriaRepository->update($request->all(), $id);

        Flash::success('Vistoria atualizada com sucesso"');

        return redirect(route('vistorias.index'));
    }

    public function destroy($id)
    {
        $vistoria = $this->vistoriaRepository->findWithoutFail($id);

        if (empty($vistoria)) {
            Flash::error('Vistoria não encontrada');

            return redirect(route('vistorias.index'));
        }

        $this->vistoriaRepository->delete($id);

        Flash::success('Vistoria excluída com sucesso.');

        return redirect(route('vistorias.index'));
    }

    public function toBR($date1){
		$date2 = explode('-',$date1);
		$date2 = $date2[2].'-'.$date2[1].'-'.$date2[0];
		return $date2;
    }

	public function dtus($dt){
		$d = explode('-',$dt);
		$d = $d[2].'-'.$d[1].'-'.$d[0];
		return $d;
	}
}
