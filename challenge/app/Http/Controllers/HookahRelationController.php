<?php

namespace App\Http\Controllers;

use App\Models\HookahRelation;
use App\Http\Requests\HookahRelRequest;
use Illuminate\Http\JsonResponse;

class HookahRelationController extends Controller
{
    /**
     * @SWG\Post(
     *      path="/hookah-in-bar",
     *      tags={"HookahRelation"},
     *      summary="Add hookah in bar",
     *      description="Create hookah",
     *
     *     @SWG\Parameter(
     *          name="hookah_id",
     *          description="Hookah ID",
     *          required=true,
     *          type="integer",
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="hookah_br_id",
     *          description="Hookah bar ID",
     *          required=true,
     *          type="integer",
     *          in="query"
     *      ),
     *      @SWG\Response(
     *          response=201,
     *          description="Hookah add to bar",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/HookahRelation")
     *         ),
     *       ),
     *
     *      @SWG\Response(response=422, description="Error validation"),
     *      @SWG\Response(response=404, description="Error create"),
     * )
     */
    public function create(HookahRelRequest $request): JsonResponse
    {
        $hookahRel = HookahRelation::create($request->all());

        if ($hookahRel) {
            return response()->json($hookahRel, 201);
        }
        return response()->json('Error', 404);
    }

    /**
     * @SWG\Delete(
     *      path="/hookah-in-bar/{id}",
     *      operationId="getProjectById",
     *      tags={"HookahRelation"},
     *      summary="Delete hookah from bar by ID",
     *      description="Delete hookah from bar by ID",
     *      @SWG\Parameter(
     *          name="id",
     *          description="Hookah ID",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=204,
     *          description="successful deleted"
     *       ),
     *      @SWG\Response(response=404, description="Bar Not Found")
     *
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $hookahRel = HookahRelation::where('hookah_id', $id)->first();

        if ($hookahRel and $hookahRel->delete()) {
            return response()->json('', 204);
        }
        return response()->json('Not found', 404);
    }
}
