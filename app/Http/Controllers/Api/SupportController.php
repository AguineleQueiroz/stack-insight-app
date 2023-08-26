<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Resources\SupportResource;
use App\Services\SupportServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportServices $services){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
        $support = $this->services->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 3),
            filter: $request->filter,
        );
        return SupportResource::collection($support->getItems())->additional([
            "meta" => [
                "total" => $support->total(),
                "is_first_page" => $support->isFirstPage(),
                "is_last_page" => $support->isLastPage(),
                "previous_page" => $support->getPreviousPage(),
                "current_page" => $support->currentPage(),
                "next_page" => $support->getNextPage(),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupport $request): SupportResource
    {
        $support = $this->services->new(CreateSupportDTO::makeFromRequest($request));
        return new SupportResource($support);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse|SupportResource
    {
        $support = $this->services->findOne($id);
        if (!$support) {
            return response()->json(["error" => "Support not found."], Response::HTTP_NOT_FOUND);
        }
        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupport $request, string $id)
    {
        $request->merge(["id" => $id]);
        $support = $this->services->update( UpdateSupportDTO::makeFromRequest($request));
        if(!$support) {
            return response()->json(["error" => "Support not found."], Response::HTTP_NOT_FOUND);
        }
        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->services->findOne($id)) {
            return response()->json(["error" => "Support does not exist."], Response::HTTP_NOT_FOUND);
        }
        $this->services->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
