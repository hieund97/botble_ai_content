<?php

namespace Botble\Member\Http\Requests;

use Botble\Blog\Http\Requests\PostRequest as BasePostRequest;
use Botble\Media\Facades\RvMedia;

class PostRequest extends BasePostRequest
{
    public function rules(): array
    {
        $rules = parent::rules();

        if ($this->hasFile('image_input')) {
            $rules['image_input'] = RvMedia::imageValidationRule();

            unset($rules['image']);
        }

        return $rules;
    }
}
