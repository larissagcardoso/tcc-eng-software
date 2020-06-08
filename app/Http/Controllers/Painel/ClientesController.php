<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\ClientesFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Clientes;
use Illuminate\Support\Facades\Auth;


class ClientesController extends Controller
{

    private $clientes;
    private $totalPage = 10;

    public function __construct(Clientes $clientes)
    {
        $this->clientes = $clientes;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            echo "Nao autenticado";
            exit();
        }

        $clientes = $this->clientes->paginate($this->totalPage);

        return view ('painel.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Cliente';
        $plano = ['mensal', 'anual'];
        return view('painel.clientes.create-edit', compact('title', 'plano'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesFormRequest $request)
    {
        $dataForm = $request->all();


        //faz cadastro
        $insert = $this->clientes->create($dataForm);

        if ($insert)
            return redirect()->route('clientes.index');
        else
            return redirect()->route('clientes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente =$this->clientes->find($id);
        $title = "Produto: {$cliente->name}";
        return view ('painel.clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //recupera o produto pelo id
        $cliente = $this->clientes->find($id);
        $title = "Editar Cliente: {$cliente->name}";
        $plano = ['anual','mensal'];
        return view('painel.clientes.create-edit',compact('title','plano', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesFormRequest $request, $id)
    {
        //Recupera todos os dados do formulário
        $dataForm = $request->all();

        //Recupera o item para editar
        $clientes = $this->clientes->find($id);

        //Verifica ser realmente editou
        $update = $clientes->update($dataForm);

        if ($update)
            return redirect()->route('clientes.index');

        else
            return redirect()->route('clientes.edit',$id)->with(['errors'=>'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->clientes->find($id);

        $delete = $cliente->delete();

        if($delete)
            return redirect()->route('clientes.index');
        else
            return redirect()->route('clientes.show',$id)->with(['errors' => 'Falha ao deletar itens']);
    }
}
