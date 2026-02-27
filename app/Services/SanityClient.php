<?php

namespace App\Services;

use Sanity\Client;
use function SanityImageUrl\urlBuilder;
use Illuminate\Support\Facades\Http;

class SanityClient
{
    protected $client;
    protected $builder;

    public function __construct()
    {
        // Inicializa el cliente de Sanity
        $this->client = new Client([
            'projectId' => config('services.sanity.projectId'),
            'dataset' => config('services.sanity.dataset'),
            'token' => config('services.sanity.token'),
            'apiVersion' => config('services.sanity.version'),
            'useCdn' => false,
        ]);

        // Inicializa el builder para crear URLs de las imágenes
        $this->builder = urlBuilder([
            'projectId' => config('services.sanity.projectId'),
            'dataset' => config('services.sanity.dataset'),
        ]);
    }


    // Método para hacer fetch de datos desde Sanity
    public function fetch($query, $params = [])
    {
        return $this->client->fetch($query, $params);
    }

    public function urlFor($source)
    {
        return $this->builder->image($source);
    }

    public function mutate(array $mutations): array
    {
        $projectId = config('services.sanity.projectId');
        $dataset = config('services.sanity.dataset');
        $version = config('services.sanity.version');
        $token = config('services.sanity.write_token');

        $url = "https://{$projectId}.api.sanity.io/v{$version}/data/mutate/{$dataset}";

        $res = Http::withToken($token)
            ->acceptJson()
            ->post($url, ['mutations' => $mutations]);
        
        if (!$res->ok()) {
            throw new \RuntimeException("Sanity mutate error: ".$res->body());
        }

        return $res->json();
    }

    public function patchSet(string $docId, array $set): array
    {
        return $this->mutate([
            [
                'patch' => [
                    'id' => $docId,
                    'set' => $set
                ],
            ],
        ]);
    }
}
