<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\ProductFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;
    private $totalPage = 10;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = $this->product->paginate($this->totalPage);

       return view ('painel.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Produto';
        $categorys = ['eletronicos','moveis','limpeza','banho'];
        return view('painel.products.create-edit',compact('title','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //dd($request->all());
        //dd ($request->only(['name','number']));
        //dd ($request->except(['_token']));

        //pega dados formulario
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //valida os dados
        /*$this->validate($request, $this->product->rules);

        if ($validate->fails()){
            return redirect()
                ->route('produtos.create')
                ->withErrors($validate)
                ->withInput();
        }*/

        //faz cadastro
        $insert = $this->product->create($dataForm);

        if ($insert )
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =$this->product->find($id);
        $title = "Produto: {$product->name}";
        return view ('painel.products.show',compact('product','title'));
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
        $product = $this->product->find($id);
        $title = "Editar Produto: {$product->name}";
        $categorys = ['eletronicos','moveis','limpeza','banho'];
        return view('painel.products.create-edit',compact('title','categorys', 'product'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
       //Recupera todos os dados do formulário
        $dataForm = $request->all();

        //Recupera o item para editar
        $product = $this->product->find($id);

        //Verifica ser produto está ativado
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //Verifica ser realmente editou
        $update = $product->update($dataForm);

        if ($update)
            return redirect()->route('produtos.index');

        else
            return redirect()->route('produtos.edit',$id)->with(['errors'=>'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        $delete = $product->delete();

        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show',$id)->with(['errors' => 'Falha ao deletar itens']);
    }

    public function tests()
    {
     /* Insert
      * Definir itens que vao ser inseridos no model
      * $insert = $this->product->create([
                  'name'        => 'Nome do Produto 3',
                  'number'      => 51465,
                  'active'      => false,
                  'category'    => 'eletronicos',
                  'description' => 'Descrição vem aqui',
              ]);
     if ($insert)
         return "Inserido com sucesso, ID: {$insert->id}";
     else
         return 'Falha ao inserir';



     Updates
     $prod = $this->product->find(4);
     //dd($prod);
        $prod -> name = 'Update';
        $prod -> number = 232323;
        $prod -> active = true;
        $prod -> category = 'eletronicos';
        $prod -> description = 'Desc update';
        $update = $prod ->save();

        if ($update)
            return "Alterado com sucesso!";
        else
            return 'Falha ao alterar';

        $prod = $this->product->find(3);
        $update = $prod->update ([
            'name'        => 'Update teste',
            'number'      => 51465,
            'active'      => true,
            'category'    => 'eletronicos',
            'description' => 'Descrição vem aqui',
        ]);

        if ($update)
            return "Alterado com sucesso!";
        else
            return 'Falha ao alterar';

        $update = $this->product
                ->where('number',51465)
                ->update ([
            'name'        => 'Update teste',
            'number'      => 4444,
            'active'      => true,

        ]);

        if ($update)
            return "Alterado com sucesso!";
        else
            return 'Falha ao alterar';

     //Delete
       $prod = $this->product->find(3);
       $delete = $prod->delete();

       if ($delete)
           return 'Deletado com sucesso!';
       else
           return 'Falha ao deletar';

     //Delete por where
        $delete= $this->product
                        ->where('number',343443)
                        ->delete();

        if ($delete)
            return 'Deletado com sucesso 2!';
        else
            return 'Falha ao deletar';*/

    }
}
