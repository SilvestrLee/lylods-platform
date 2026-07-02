<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

/**
 * Rejects raster image uploads that fail to decode (truncated/corrupt files).
 */
class NotCorruptImage implements ValidationRule
{
    private const RASTER_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value instanceof UploadedFile) {
            return;
        }

        if (! in_array(strtolower($value->getClientOriginalExtension()), self::RASTER_EXTENSIONS, true)) {
            return;
        }

        if (@getimagesize($value->getRealPath()) === false) {
            $fail('The :attribute is not a valid or readable image.');
        }
    }
}
