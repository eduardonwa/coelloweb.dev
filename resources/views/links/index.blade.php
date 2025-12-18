<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis enlaces</title>
    @vite(['resources/js/app.js'])
</head>
<body class="container main-card" data-type="wide">
    <div class="main-card__shell">
        @foreach($links as $group)
            <h1 class="text-center heading-2">{{ $group['encabezado'] }}</h1>
            
            <p class="descripcion">{{ $group['descripcion'] }}</p>
            
            <div class="buttons-shell">
                @foreach($group['url'] as $item)
                    @if($item['activo'])
                        
                    @php $variant = $item['variant'] ?? ''; @endphp
                        
                        <a class="button"
                           data-type="links"
                           data-variant="{{ $variant }}"
                           href="{{ $item['href'] }}"
                           target="_blank"
                        >
                            @if(!empty($item['iconUrl']))
                                <img
                                    src="{{ $item['iconUrl'] }}" 
                                    alt="{{ $item['etiqueta'] }}"
                                    class="icon"
                                    loading="lazy"
                                >
                            @endif
                            {{ $item['etiqueta'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>