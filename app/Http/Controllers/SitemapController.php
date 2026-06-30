<?php

namespace App\Http\Controllers;

use App\Services\CMS\SitemapService;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __construct(private SitemapService $service) {}

    public function __invoke(): Response
    {
        $entries = $this->service->entries();

        return response()
            ->view('sitemap', compact('entries'))
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
