<?php

namespace App\Transformers\Estoque;

use Illuminate\Http\Resources\Json\Resource;

use App\Services\ResponseService;

use App\Repositories\Estoque\EstoqueRepository;
use App\Repositories\Produto\ProdutoRepository;
use App\Repositories\Loja\LojaRepository;

class EstoqueResource extends Resource
{
    /**
     * @var
     */
    private $config;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $config = array())
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);

        $this->config = $config;
    }
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $ProdutoRepository = new ProdutoRepository();
        $LojaRepository = new LojaRepository();

        $produto = $ProdutoRepository->find($this->fk_id_produto);
        $loja = $LojaRepository->find($this->fk_id_loja);

        return [
                'id'               => $this->id,
                'produto_id'       => $this->fk_id_produto,
                'produto_nome'     => $produto->nome,
                'loja_id'          => $this->fk_id_loja,
                'loja_nome'        => $loja->nome,
                'quantidade'       => $this->quantidade,
                'createdAt'        => $this->created_at,
                'updatedAt'        => $this->updated_at
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return ResponseService::default($this->config,$this->id);
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request
     * @param  \Illuminate\Http\Response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(200);
    }
}
