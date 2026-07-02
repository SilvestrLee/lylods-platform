<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        $uuid      = (string) Str::uuid();
        $extension = 'jpg';
        $filename  = "{$uuid}.{$extension}";
        $directory = 'cms/uploads';

        return [
            'uuid'              => $uuid,
            'title'             => fake()->words(3, true),
            'original_filename' => $filename,
            'filename'          => $filename,
            'directory'         => $directory,
            'extension'         => $extension,
            'alt_text'          => fake()->sentence(4),
            'caption'           => null,
            'description'       => null,
            'credit'            => null,
            'copyright'         => null,
            'path'              => "{$directory}/{$filename}",
            'disk'              => 'public',
            'mime_type'         => 'image/jpeg',
            'category'          => fake()->randomElement([
                'uploads', 'brand', 'homepage', 'services', 'case-studies',
                'insights', 'partners', 'downloads', 'compliance', 'team', 'logos',
            ]),
            'file_size'         => fake()->numberBetween(20_000, 2_000_000),
            'width'             => 1200,
            'height'            => 800,
            'focal_point_x'     => null,
            'focal_point_y'     => null,
            'variants'          => null,
            'checksum'          => md5($uuid),
            'dominant_colour'   => fake()->hexColor(),
            'is_public'         => true,
            'uploaded_by'       => null,
            'updated_by'        => null,
        ];
    }
}
