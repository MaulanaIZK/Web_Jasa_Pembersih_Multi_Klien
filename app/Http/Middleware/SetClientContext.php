<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

final class SetClientContext
{
    public function handle(Request $request, Closure $next): Response
    {
        $own = $request->user()?->client;
        abort_if($own === null, 403, 'Profil Client tidak ditemukan.');

        // {client} di URL bisa berupa model (sudah di-bind) atau teks id
        $param = $request->route('client');
        $urlId = $param instanceof Client ? (int) $param->getKey() : (int) $param;

        abort_if($urlId !== (int) $own->id, 403, 'Anda tidak berhak mengakses data Client lain.');

        // Supaya route('client.xxx') tanpa parameter otomatis terisi
        URL::defaults(['client' => $own->id]);

        return $next($request);
    }
}