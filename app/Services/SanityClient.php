<?php

namespace App\Services;

use Sanity\Client;
use function SanityImageUrl\urlBuilder;

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
            'apiVersion' => '2023-10-01',
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
}
