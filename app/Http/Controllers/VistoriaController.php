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

	public function __construct(VistoriaRepository $vistoriaRepo, PontoRepository $pontoRepository)
    {
        $this->vistoriaRepository = $vistoriaRepo;
        $this->ponto = $pontoRepository;

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
        return view('vistorias.create');
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
        $ponto_id = $vistoria->ponto_id;
        return redirect(route('pontos.show',$ponto_id));
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
        $vistoria = $this->vistoriaRepository->findWithoutFail($id);
        $vistoria->data_abordagem = $this->toBR($vistoria->data_abordagem);
        $ponto_id = $vistoria->ponto_id;
        $ponto = $this->ponto->find($ponto_id);

        if (empty($vistoria)) {
            Flash::error('Vistoria not found');

            return redirect(route('vistorias.index'));
        }
        return view('vistorias.edit',compact('vistoria','ponto'));
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

        Flash::success('Vistoria updated successfully.');

        return redirect(route('vistorias.index'));
    }

    public function destroy($id)
    {
        $vistoria = $this->vistoriaRepository->findWithoutFail($id);

        if (empty($vistoria)) {
            Flash::error('Vistoria not found');

            return redirect(route('vistorias.index'));
        }

        $this->vistoriaRepository->delete($id);

        Flash::success('Vistoria deleted successfully.');

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
