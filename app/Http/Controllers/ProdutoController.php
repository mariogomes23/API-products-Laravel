<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produto\ProdutoCreateRequest;
use App\Http\Requests\Produto\ProdutoUpdateRequest;
use App\Http\Resources\Produto\ProdutoResource;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //
    private $product;

    public function __construct(Produto $produto)
    {
        $this->product = $produto;

    }
    // ============================================

    public function index(){

    $products = $this->product->paginate();

    return ProdutoResource::collection($products);
    }

    //================================================
    public function show($id){

        $products= $this->product->findOrFail($id);

        return new ProdutoResource($products);

        }


        //============================
        public function store(ProdutoCreateRequest $request){

            $imageName = time().'.'.$request->image->extension();

            $products = $this->product->create([

                "title"=>$request->title,
                "description"=>$request->description,
                "image"=>$request->image->storeAs("image",$imageName),
                "price"=>$request->price,



            ]);

            return new ProdutoResource($products);

            }

        // ====================================================

        public function update(ProdutoUpdateRequest $request,$id){

            $imageName = time().'.'.$request->image->extension();
            $products = $this->product->findOrFail($id);
            $products->update([

                "title"=>$request->title,
                "description"=>$request->description,
                "image"=>$request->image->storeAs("image",$imageName),
                "price"=>$request->price
            ]);

            return new ProdutoResource($products);
            }

            //=================================================

            public function destroy($id){

                $products = $this->product->findOrFail($id);
                $products->delete();

                return new ProdutoResource($products);
                }
}
