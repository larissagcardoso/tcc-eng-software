<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\InstrutoresFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Instrutores;

class InstrutoresController extends Controller
{

    private $instrutores;
    private $totalPage = 10;

    public function __construct(Instrutores $instrutores)
    {
        $this->instrutores = $instrutores;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instrutores = $this->instrutores->paginate($this->totalPage);

        return view ('painel.instrutores.index',compact('instrutores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Instrutor';
        $atividades = ['musculacao', 'aula em grupo', 'natacao'];
        return view('painel.instrutores.create-edit', compact('title', 'atividades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( InstrutoresFormRequest $request)
    {
        $dataForm = $request->all();

        //faz cadastro
        $insert = $this->instrutores->create($dataForm);

        if ($insert)
            return redirect()->route('instrutores.index');
        else
            return redirect()->route('instrutores.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instrutor =$this->instrutores->find($id);
        $title = "Produto: {$instrutor->name}";
        return view ('painel.instrutores.show',compact('instrutor','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //recupera o produto pelo id
        $instrutor = $this->instrutores->find($id);
        $title = "Editar Instrutor: {$instrutor->name}";
        $atividades = ['musculacao','aula em grupo','natacao'];
        return view('painel.instrutores.create-edit',compact('title','atividades', 'instrutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstrutoresFormRequest $request, $id)
    {
        //Recupera todos os dados do formulário
        $dataForm = $request->all();

        //Recupera o item para editar
        $instrutores = $this->instrutores->find($id);

        //Verifica ser realmente editou
        $update = $instrutores->update($dataForm);

        if ($update)
            return redirect()->route('instrutores.index');

        else
            return redirect()->route('instrutores.edit',$id)->with(['errors'=>'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instrutor = $this->instrutores->find($id);

        $delete = $instrutor->delete();

        if($delete)
            return redirect()->route('instrutores.index');
        else
            "return redirect()->route('instrutores.show',$id)->with(['errors' => 'Falha ao deletar itens'])";
    }

}
