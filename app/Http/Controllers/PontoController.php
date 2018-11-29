<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePontoRequest;
use App\Http\Requests\UpdatePontoRequest;
use App\Repositories\EnderecoRepository;
use App\Repositories\PontoRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VistoriaRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
/*
SELECT
IF(vistorias.resistencia,1,0) +
IF(vistorias.num_reduzido,1,0) +
IF(vistorias.casal,1,0) +
IF(vistorias.catador_reciclados,1,0)+
IF(vistorias.resistencia,1,0) +
IF(vistorias.fixacao_antiga,1,0) +
IF(vistorias.excesso_objetos,1,0) +
IF(vistorias.resistencia,1,0) +
IF(vistorias.fixacao_antiga,1,0) +
IF(vistorias.excesso_objetos,1,0) +
IF(vistorias.trafico_ilicitos,1,0) +
IF(vistorias.menores_idosos,1,0) +
IF(vistorias.deficiente,1,0) +
IF(vistorias.agrupamento_quimico,1,0) +
IF(vistorias.saude_mental,1,0) +
IF(vistorias.animais,1,0) +
IF(vistorias.estrutura_abrigo_provisorio,1,0) AS nivel_complexidade
FROM
vistorias
 */

class PontoController extends AppBaseController
{
	private $pontoRepository;
	private $enderecoRepository;
	private $vistoriaRepository;

	public function __construct(PontoRepository $pontoRepository,
	                            EnderecoRepository $enderecoRepository,
	                            VistoriaRepository $vistoriaRepository

	)
	{
		$this->pontoRepository    = $pontoRepository;
		$this->enderecoRepository = $enderecoRepository;
		$this->vistoriaRepository = $vistoriaRepository;
	}

	public function index(Request $request)
	{
		$logradouro = $request->logradouro;
		$numero     = $request->numero;
		$pontos     = $this->pontoRepository->buscar($request);

		return view('pontos.index', compact('pontos', 'logradouro', 'numero'));
	}

	public function create()
	{
		return view('pontos.create');
	}

	public function store(CreatePontoRequest $request)
	{
		$input = $request->all();
		$ponto = $this->pontoRepository->create($input);
		Flash::success('Ponto saved successfully.');
		return redirect(route('pontos.show',$ponto->id));
	}


	public function show($id)
	{
		$ponto     = $this->pontoRepository->findWithoutFail($id);
		$vistorias = $this->vistoriaRepository->listarById($id);
		if (empty($ponto))
		{
			Flash::error('Ponto not found');

			return redirect(route('pontos.index'));
		}
		return view('pontos.show', compact('ponto', 'vistorias'));
	}


	public function edit($id)
	{
		$ponto = $this->pontoRepository->findWithoutFail($id);

		if (empty($ponto))
		{
			Flash::error('Ponto not found');

			return redirect(route('pontos.index'));
		}

		return view('pontos.edit')->with('ponto', $ponto);
	}


	public function update($id, UpdatePontoRequest $request)
	{
		$ponto = $this->pontoRepository->findWithoutFail($id);

		if (empty($ponto))
		{
			Flash::error('Ponto not found');

			return redirect(route('pontos.index'));
		}

		$ponto = $this->pontoRepository->update($request->all(), $id);

		Flash::success('Ponto updated successfully.');

		return redirect(route('pontos.index'));
	}


	public function destroy($id)
	{
		$ponto = $this->pontoRepository->findWithoutFail($id);

		if (empty($ponto))
		{
			Flash::error('Ponto not found');

			return redirect(route('pontos.index'));
		}

		$this->pontoRepository->delete($id);

		Flash::success('Ponto deleted successfully.');

		return redirect(route('pontos.index'));
	}

	public function autoComplete(Request $request)
	{
		$q    = $request->q;
		$data = DB::table('ender')
			->take(30)
			->join('pontos', 'pontos.endereco_id', '=', 'ender.id')
			->select('pontos.id', 'pontos.numero', 'ender.logradouro', 'ender.bairro', 'ender.regional')
			->where('logradouro', 'LIKE', $q . '%')
			->orderBy('logradouro')
			->orderBy('regional')
			->orderBy('bairro')
			->get();

		foreach ($data as $item)
		{
			$results[] = ['text' => $item->logradouro . ' - ' . $item->numero . ' - ' . $item->bairro . ' - ' . $item->regional, 'id' => $item->id];
		}
		if (count($results) > 0)
		{
			return response()->json($results);
		}
		else
		{
			return null;
		}

	}

}
