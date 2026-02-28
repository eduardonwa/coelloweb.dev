<?php

namespace App\Services;

use Sanity\Client;
use function SanityImageUrl\urlBuilder;
use Illuminate\Support\Facades\Http;

class SanityClient
{
    protected $client;
    protected $builder;

    private function clientFor(string $dataset): Client
    {
        // Inicializa el cliente de Sanity
        $this->client = new Client([
            'projectId'  => config('services.sanity.projectId'),
            'dataset'    => $dataset,
            'token'      => config('services.sanity.token'),
            'apiVersion' => config('services.sanity.version'),
            'useCdn'     => false,
        ]);
    }

    private function builderFor(string $dataset)
    {
        // Inicializa el builder para crear URLs de las imágenes
        return urlBuilder([
            'projectId' => config('services.sanity.projectId'),
            'dataset'   => $dataset,
        ]);
    }


    // Método para hacer fetch de datos desde Sanity
    public function fetch($query, $params = [], ?string $dataset = null)
    {
        $dataset = $dataset ?: config('services.sanity.dataset');
        return $this->clientFor($dataset)->fetch($query, $params);
    }

    public function urlFor($source, ?string $dataset = null)
    {
        $dataset = $dataset ?: config('services.sanity.dataset');
        return $this->builderFor($dataset)->image($source);
    }

    public function mutate(array $mutations, ?string $dataset = null): array
    {
        $dataset   = $dataset ?: config('services.sanity.dataset');
        $projectId = config('services.sanity.projectId');
        $version   = config('services.sanity.version');
        $token     = config('services.sanity.write_token');

        $url = "https://{$projectId}.api.sanity.io/v{$version}/data/mutate/{$dataset}";

        $res = Http::withToken($token)
            ->acceptJson()
            ->post($url, ['mutations' => $mutations]);
        
        if (!$res->ok()) {
            throw new \RuntimeException("Sanity mutate error: ".$res->body());
        }

        return $res->json();
    }

    public function patchSet(string $docId, array $set, ?string $dataset = null): array
    {
        return $this->mutate([
            [
                'patch' => [
                    'id' => $docId,
                    'set' => $set
                ],
            ],
        ], $dataset);
    }
}
