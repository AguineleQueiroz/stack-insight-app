<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupportServices;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct( protected SupportServices $service ){}
    public function replies( string $id ) {
        $support = $this->service->findOne($id);
        if (!$support) {
            return back();
        }
        return view('admin.supports.replies.replies', compact('support'));
    }
}
