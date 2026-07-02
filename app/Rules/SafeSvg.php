<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

/**
 * Rejects SVG uploads containing script tags, event handler attributes,
 * embedded foreignObject content, or XXE-style DOCTYPE/ENTITY declarations.
 */
class SafeSvg implements ValidationRule
{
    private const DANGEROUS_PATTERNS = [
        '/<script\b/i',
        '/\bon\w+\s*=/i',
        '/javascript:/i',
        '/<foreignObject\b/i',
        '/<!ENTITY/i',
        '/<!DOCTYPE[^>]*SYSTEM/i',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value instanceof UploadedFile) {
            return;
        }

        if (strtolower($value->getClientOriginalExtension()) !== 'svg') {
            return;
        }

        $contents = file_get_contents($value->getRealPath());

        if ($contents === false) {
            $fail('The :attribute could not be read.');

            return;
        }

        foreach (self::DANGEROUS_PATTERNS as $pattern) {
            if (preg_match($pattern, $contents)) {
                $fail('The :attribute contains disallowed SVG content and cannot be uploaded.');

                return;
            }
        }
    }
}
