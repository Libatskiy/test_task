<?php

namespace App\Http\Controllers;

use App\Models\HookahBar;
use DB;
use App\Http\Requests\HookahBarRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HookahBarController extends Controller
{
    /**
     * @SWG\Get(
     *      path="/bars",
     *      tags={"Bars"},
     *      summary="Get list of bars",
     *      description="Returns list of bars",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/HookahBar")
     *         ),
     *       ),
     *       @SWG\Response(response=404, description="Bad request"),
     * )
     */
    public function get(Request $request): JsonResponse
    {
        $limit = (int) $request->get('limit', 100);
        $offset = (int) $request->get('offset', 0);
        $result = DB::table('hookah_bars')->limit($limit)->offset($offset)->get();
        return response()->json($result, 200);
    }

    /**
     * @SWG\Delete(
     *      path="/bars/{id}",
     *      operationId="getProjectById",
     *      tags={"Bars"},
     *      summary="Delete bar by ID",
     *      description="Delete barby ID",
     *      @SWG\Parameter(
     *          name="id",
     *          description="Bar id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=204,
     *          description="successful deleted"
     *       ),
     *      @SWG\Response(response=404, description="Bar Not Found")
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $hookahBar = HookahBar::find($id);

        if ($hookahBar && $hookahBar->delete()) {
            return response()->json('Deleted', 204);
        }
        return response()->json('Not found', 404);
    }

    /**
     *
     *  @SWG\Post(
     *      path="/bars",
     *      tags={"Bars"},
     *      summary="Create bar",
     *      description="Create bar",
     *      @SWG\Parameter(
     *          name="name",
     *          description="Bar name",
     *          required=true,
     *          type="string",
     *          in="query"
     *      ),
     *      @SWG\Response(
     *          response=201,
     *          description="successful created",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/HookahBar")
     *         ),
     *       ),
     *       ),
     *      @SWG\Response(response=402, description="Error validation"),
     *      @SWG\Response(response=404, description="Error create")
     * )
     */
    public function create(HookahBarRequest $request): JsonResponse
    {
        $hookahBar = HookahBar::create($request->all());

        if ($hookahBar) {
            return response()->json($hookahBar, 201);
        }
        return response()->json('Error', 404);
    }



}
