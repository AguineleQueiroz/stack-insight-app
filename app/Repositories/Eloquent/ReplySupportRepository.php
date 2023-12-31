<?php

namespace App\Repositories\Eloquent;

use App\DTO\Replies\CreateReplyDTO;
use App\Models\ReplySupport;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
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
//        $replies = ReplySupport::findRepliesSupport($supportId);
        $replies = $this->model->findRepliesSupport($supportId);
        return $replies->toArray();
    }

    /**
     * @param CreateReplyDTO $dto
     * @return stdClass
     * @throws \Exception
     */
    public function create(CreateReplyDTO $dto):stdClass {
        $new_reply = $this->model->with('user')->create([
            'content' => $dto->content_reply,
            'support_id' => $dto->supportId,
            'user_id' => Auth::user()->id
        ]);
        return (object) $new_reply->toArray();
    }
}
