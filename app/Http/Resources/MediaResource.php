<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'uuid'       => $this->uuid,
            'title'      => $this->title,
            'alt_text'   => $this->alt_text,
            'url'        => $this->url(),
            'thumb_url'  => $this->variantUrl('thumb'),
            'mime_type'  => $this->mime_type,
            'extension'  => $this->extension,
            'width'      => $this->width,
            'height'     => $this->height,
            'file_size'  => $this->file_size,
            'category'   => $this->category,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
