<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\VideoResource;
use App\Models\Video;
use App\Traits\PaginateJsonResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllVideosController extends Controller
{
    use PaginateJsonResponse;

    /**
     * Get all videos.
     *
     * @param Request $request
     * @return JsonResponse
     */
   public function __invoke(Request $request): JsonResponse
   {
       $paginator = Video::query()->paginate(
           $request->get('perPage', 10),
           ['*'],
           'page',
           $request->get('page', 1),
       );

       return response()->json([
           'message' => 'Videos lists successfully',
           'data' => $this->paginate($paginator, VideoResource::class),
       ]);
   }
}
