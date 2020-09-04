<?php

namespace App\Http\Controllers;

use App\Models\Hookah;
use App\Http\Requests\HookahRequest;
use App\Repositories\Contracts\HookahRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class HookahController
 * @package App\Http\Controllers
 */
class HookahController extends Controller
{
    private $hookahRepository;

    public function __construct(HookahRepositoryInterface $repository)
    {
        $this->hookahRepository = $repository;
    }

    /**
     * @SWG\Get(
     *      path="/hookahs",
     *      tags={"Hookahs"},
     *      summary="Get list of hookahs",
     *      description="Returns list of hookahs",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Hookah")
     *         ),
     *       ),
     *       @SWG\Response(response=404, description="Bad request"),
     *)
     */
    public function get(Request $request): JsonResponse
    {
        $limit = (int) $request->get('limit', 100);
        $offset = (int) $request->get('offset', 0);
        $result = $this->hookahRepository->getAll($offset, $limit);
        return response()->json($result, 200);
    }

    /**
     * @SWG\Delete(
     *      path="/hookahs/{id}",
     *      operationId="getProjectById",
     *      tags={"Hookahs"},
     *      summary="Delete hookah by ID",
     *      description="Delete hookah by ID",
     *      @SWG\Parameter(
     *          name="id",
     *          description="Hookah id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=204,
     *          description="successful deleted"
     *       ),
     *      @SWG\Response(response=404, description="Hookah Not Found")
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $hookah = $this->hookahRepository->findById($id);

        if ($hookah and $hookah->delete()) {
            return response()->json('', 204);
        }
        return response()->json('Not found', 404);
    }

    /**
     *  @SWG\Post(
     *      path="/hookahs",
     *      tags={"Hookahs"},
     *      summary="Create hookah",
     *      description="Create hookah",
     *      @SWG\Parameter(
     *          name="name",
     *          description="Hookah name",
     *          required=true,
     *          type="string",
     *          in="query"
     *      ),
     *     @SWG\Parameter(
     *          name="pipe",
     *          description="Number pipe",
     *          required=true,
     *          type="integer",
     *          in="query"
     *      ),
     *     @SWG\Parameter(
     *          name="price",
     *          description="Price of hookah",
     *          required=true,
     *          type="integer",
     *          in="query"
     *      ),
     *      @SWG\Response(
     *          response=201,
     *          description="successful created",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Hookah")
     *         ),
     *       ),
     *      @SWG\Response(response=422, description="Error validation"),
     *      @SWG\Response(response=404, description="Error create"),
     * )
     */
    public function create(HookahRequest $request): JsonResponse
    {
        $hookah = Hookah::create($request->all());

        if ($hookah) {
            return response()->json($hookah, 201);
        }
        return response()->json('Error', 404);
    }

    /**
     * @SWG\Get(
     *      path="/hookahs/find/bar={bar}/from={timeFrom}/to={timeTo}/people={people}",
     *      tags={"Hookahs"},
     *      summary="Get list of free hookahs in bar",
     *      description="Returns list of free hookahs in bar",
     *     @SWG\Parameter(
     *          name="bar",
     *          description="Need bar ID",
     *          required=true,
     *          type="integer",
     *          in="path",
     *      ),
     *     @SWG\Parameter(
     *          name="timeFrom",
     *          description="time from need hookah",
     *          required=true,
     *          type="string",
     *          in="path",
     *      ),
     *     @SWG\Parameter(
     *          name="timeTo",
     *          description="time to need hookah",
     *          required=true,
     *          type="string",
     *          in="path",
     *      ),
     *     @SWG\Parameter(
     *          name="people",
     *          description="number people who need hookah",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Hookah")
     *         ),
     *       ),
     *       @SWG\Response(response=404, description="Bad request"),
     *)
     */
    public function find(int $bar, string $timeFrom, string $timeTo, int $people): JsonResponse
    {
        $result = $this->hookahRepository->findFree($bar, $timeFrom, $timeTo, $people);
        return response()->json($result, 200);
    }


}
