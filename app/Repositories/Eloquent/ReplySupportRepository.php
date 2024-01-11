<?php

namespace App\Repositories\Eloquent;

use App\DTO\Replies\CreateReplyDTO;
use App\Models\ReplySupport;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ReplySupportRepository implements ReplyRepositoryInterface
{
    /**
     * @param ReplySupport $model
     */
    public function __construct(protected ReplySupport $model ){}

    /**
     * @param string $supportId
     * @return array
     */
    public function getRepliesBySupport(string $supportId):array {
        $replies = $this->model->with(['user', 'support'])->where('support_id', $supportId)->get();
        return $replies->toArray();
    }

    /**
     * @param CreateReplyDTO $dto
     * @return stdClass
     * @throws \Exception
     */
    public function create(CreateReplyDTO $dto):stdClass {
        $new_reply = $this->model->create([
            'content' => $dto->content_reply,
            'support_id' => $dto->supportId,
            'user_id' => Auth::user()->id
        ]);
        $new_reply = $new_reply->with('user')->first();
        return (object) $new_reply->toArray();
    }

    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id): bool
    {
        $reply = $this->model->find($id);
        if(Gate::denies('owner', $reply->user->id)) {
            abort(403, 'Unauthorized operation.');
        }
        return (bool) $reply->delete($id);
    }
}
