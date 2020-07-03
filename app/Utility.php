<?php

namespace App;

use Illuminate\Support\Facades\Validator;

class Utility
{
    public function checkForErrorMessages($request, $validationMessages, $errorcode)
    {
        //$language = $request->header('Accept-Language');
        //$messages = $this->getErrorMessages($language);

        $validator = Validator::make($request->all(), $validationMessages);
        //$validator = Validator::make(collect($request->getContent())->toArray(), $validationMessages);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()->first(),
            ], $errorcode);
        }
    }
}
