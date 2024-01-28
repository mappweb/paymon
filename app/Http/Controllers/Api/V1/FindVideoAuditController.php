<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\VideoAuditResource;
use App\Models\Video;
use App\Traits\PaginateJsonResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FindVideoAuditController extends Controller
{
    use PaginateJsonResponse;

    /**
     * Get all videos.
     *
     * @param Request $request
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
       $paginator = $video->audit()->paginate(
           $request->get('perPage', 10),
           ['*'],
           'page',
           $request->get('page', 1),
       );

       return response()->json([
           'message' => 'Audits lists successfully',
           'data' => $this->paginate($paginator, VideoAuditResource::class),
       ]);
   }
}
