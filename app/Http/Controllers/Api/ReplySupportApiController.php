<?php

namespace App\Http\Controllers\Api;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Http\Resources\ReplySupportResource;
use App\Services\ReplySupportService;
use App\Services\SupportServices;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;

class ReplySupportApiController extends Controller
{
    public function __construct(
        protected SupportServices $supportService,
        protected ReplySupportService $replyService
    ){}

    /**
     * @param string $support_id
     * @return JsonResponse | AnonymousResourceCollection
     */
    public function replies(string $support_id ) {
        $support = $this->supportService->findOne($support_id);
        if (!$support) {
            return response()->json(['message' => 'Replies not found.'], Response::HTTP_NOT_FOUND);
        }
        $replies = $this->replyService->getRepliesBySupport($support_id);
        if(count($replies) < 1) {
            return response()->json(['message' => 'This question does not yet have any response recorded.'], Response::HTTP_NOT_FOUND);
        }
        return ReplySupportResource::collection($replies);
    }

    /**
     * @param StoreReplySupportRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StoreReplySupportRequest $request): JsonResponse
    {
        $reply = $this->replyService->create(
            CreateReplyDTO::makeReplyFromRequest($request)
        );
        return (new ReplySupportResource($reply))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $this->replyService->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

}
