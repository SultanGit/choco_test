<?php

namespace App\Http\Controllers\Manage;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     *  @SWG\Post(
     *      path="/manage/product",
     *      operationId="product-create",
     *      tags={"Manage"},
     *      summary="create product",
     *      description="create product",
     *      @SWG\Parameter(
     *         description="Название товара",
     *         in="formData",
     *         name="name",
     *         required=true,
     *         type="string"
     *     ),
     *      @SWG\Parameter(
     *         description="Цвет",
     *         in="formData",
     *         name="color",
     *         required=true,
     *         type="string"
     *     ),
     *      @SWG\Parameter(
     *         description="Вес",
     *         in="formData",
     *         name="weight",
     *         required=true,
     *         type="float"
     *     ),
     *      @SWG\Parameter(
     *         description="Цена",
     *         in="formData",
     *         name="price",
     *         required=true,
     *         type="float"
     *     ),
     *      @SWG\Parameter(
     *         description="Тэги. Через запятую",
     *         in="formData",
     *         name="tags",
     *         required=false,
     *         type="string"
     *     ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {"Bearer": {}}
     *     }
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'color' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'tags' => 'nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()->all(),
            ];
        }

        Product::create($validator->validated());

        return [
            'success' => true,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     *  @SWG\Post(
     *      path="/manage/product/{id}",
     *      operationId="product-update",
     *      tags={"Manage"},
     *      summary="update product",
     *      description="update product",
     *      @SWG\Parameter(
     *         description="ID of product",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *      @SWG\Parameter(
     *         description="Название товара",
     *         in="formData",
     *         name="name",
     *         required=true,
     *         type="string"
     *     ),
     *      @SWG\Parameter(
     *         description="Цвет",
     *         in="formData",
     *         name="color",
     *         required=true,
     *         type="string"
     *     ),
     *      @SWG\Parameter(
     *         description="Вес",
     *         in="formData",
     *         name="weight",
     *         required=true,
     *         type="float"
     *     ),
     *      @SWG\Parameter(
     *         description="Цена",
     *         in="formData",
     *         name="price",
     *         required=true,
     *         type="float"
     *     ),
     *      @SWG\Parameter(
     *         description="Тэги. Через запятую",
     *         in="formData",
     *         name="tags",
     *         required=false,
     *         type="string"
     *     ),
     *      @SWG\Parameter(
     *         description="method",
     *         in="formData",
     *         name="_method",
     *         required=true,
     *         type="string",
     *         default="put"
     *     ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {"Bearer": {}}
     *     }
     * )
     *
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return array
     */
    public function update(Request $request, Product $product): array
    {
        $product->update($request->all());

        return [
            'success' => true,
        ];
    }

    /**
     *  @SWG\Delete(
     *      path="/manage/product/{id}",
     *      operationId="product-delete",
     *      tags={"Manage"},
     *      summary="delete product",
     *      description="delete product",
     *      @SWG\Parameter(
     *         description="ID of product",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {"Bearer": {}}
     *     }
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return array
     * @throws \Exception
     */
    public function destroy(Product $product): array
    {
        $product->categories()->detach();
        $product->delete();

        return [
            'success' => true,
        ];
    }
}
