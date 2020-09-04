<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Repositories\Contracts\ReservationRepositoryInterface;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DB;

class ReservationController extends Controller
{

    private $reservationRepository;

    public function __construct(ReservationRepositoryInterface $repository)
    {
        $this->reservationRepository = $repository;
    }

    /**
     *  @SWG\Get(
     *      path="/booking/active",
     *      tags={"Reservation"},
     *      summary="Get list of all active reservation",
     *      description="Returns llist of all active reservation",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Reservation")
     *         ),
     *       ),
     *       @SWG\Response(response=404, description="Bad request"),
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $limit = (int) $request->get('limit', 100);
        $offset = (int) $request->get('offset', 0);
        $result = $this->reservationRepository->getAllActive($offset, $limit);
        return response()->json($result, 200);
    }

    /**
     * @SWG\Get(
     *      path="/booking/active/{id}",
     *      tags={"Reservation"},
     *      summary="Get list of all active reservation in bar",
     *      description="Returns llist of all active reservation in bar",
     *     @SWG\Parameter(
     *          name="id",
     *          description="Bar ID",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Reservation")
     *         ),
     *       ),
     *       @SWG\Response(response=404, description="Bad request"),
     * )
     */
    public function getForBar(int $id): JsonResponse
    {
        $result =  $this->reservationRepository->getActiveForBar($id);
        return response()->json($result, 200);
    }

    /**
     * @SWG\Post(
     *      path="/booking",
     *      tags={"Reservation"},
     *      summary="Create reservation",
     *      description="Create reservation",
     *      @SWG\Parameter(
     *          name="name",
     *          description="Person name",
     *          required=true,
     *          type="string",
     *          in="query"
     *      ),
     *     @SWG\Parameter(
     *          name="number_people",
     *          description="Number people",
     *          required=true,
     *          type="integer",
     *          in="query"
     *      ),
     *     @SWG\Parameter(
     *          name="hookah_id",
     *          description="Hookah ID",
     *          required=true,
     *          type="integer",
     *          in="query"
     *      ),
     *     @SWG\Parameter(
     *          name="time_from",
     *          description="time from reservation hookah",
     *          required=true,
     *          type="string",
     *          in="query",
     *      ),
     *      @SWG\Response(
     *          response=201,
     *          description="successful created",
     *     @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Reservation")
     *         ),
     *       ),
     *      @SWG\Response(response=422, description="Error validation"),
     *      @SWG\Response(response=404, description="Error create"),
     * )
     */
    public function create(ReservationRequest $request): JsonResponse
    {
        $reservation = Reservation::create($request->all());
        if ($reservation) {
            return response()->json($reservation, 201);
        }
        return response()->json('Error', 404);
    }


}
