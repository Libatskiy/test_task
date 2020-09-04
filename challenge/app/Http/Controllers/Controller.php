<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @SWG\Swagger(
 *     basePath="/api/v1",
 *     schemes={"http"},
 *     host="127.0.0.1:8080",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Hookah test API",
 *         description="This is test API documentation",
 *         @SWG\Contact(
 *             email="admin@example.com"
 *         ),
 *     )
 *   )
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
