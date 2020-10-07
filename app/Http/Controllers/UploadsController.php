<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Varbox\Controllers\UploadsController as VarboxUploadsController;
use Varbox\Models\Upload;

class UploadsController extends VarboxUploadsController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Upload::count() < 20) {
            return parent::store($request);
        }

        return response()->json([
            'status' => false,
            'message' => '
                To avoid large disk space usage, only 20 UPLOADS at a time can be created within this DEMO!
                If you want to upload more files, please delete some of the old ones.
            ',
        ]);
    }
}
