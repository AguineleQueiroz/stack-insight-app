<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;
use App\Services\SupportServices;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportServices $supportService,
        protected ReplySupportService $replyService
    ){}
    public function replies( string $id ) {
        $support = $this->supportService->findOne($id);
        if (!$support) {
            return back();
        }
        $replies = $this->replyService->getRepliesBySupport($id);
//        dd($replies);
        return view('admin.supports.replies.replies', compact('support', 'replies'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request) {
        $this->replyService->create(
            CreateReplyDTO::makeReplyFromRequest($request)
        );
        return redirect()->route('replies.replies', $request->support_id)->with('message', 'reply registered successfully.');
    }

    /**
     * @param string $supportId
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $supportId, string $id): RedirectResponse
    {
        $this->replyService->delete($id);
        return redirect()->route('replies.replies', $supportId)->with('message', 'reply deleted successfully.');
    }
}
