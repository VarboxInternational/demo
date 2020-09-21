<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Varbox\Contracts\UploadModelContract;
use Varbox\Contracts\UploadServiceContract;
use Varbox\Controllers\UploadController as VarboxUploadController;
use Varbox\Exceptions\UploadException;
use Varbox\Models\Upload;

class UploadController extends VarboxUploadController
{
    /**
     * @param Request $request
     * @param UploadModelContract $model
     * @return JsonResponse
     */
    public function upload(Request $request, UploadModelContract $model)
    {
        if (Upload::count() < 20) {
            return parent::upload($request, $model);
        }

        return response()->json([
            'status' => false,
            'message' => 'Only 20 UPLOADS at a time can be created within this DEMO'
        ]);
    }
}
