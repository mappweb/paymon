<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\VideoResource;
use App\Models\Video;
use App\Traits\PaginateJsonResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FindVideoController extends Controller
{
    use PaginateJsonResponse;

    /**
     * Find video.
     *
     * @param Request $request
     * @param $videoId
     * @return JsonResponse
     */
   public function __invoke(Request $request, $videoId): JsonResponse
   {
       $video = Video::query()->find($videoId);
       if(empty($video)){
           return response()->json([
               'message' => 'Video not found.',
           ]);
       }

       return response()->json([
           'message' => 'Audits lists successfully',
           'data' => new VideoResource($video),
       ]);
   }
}
