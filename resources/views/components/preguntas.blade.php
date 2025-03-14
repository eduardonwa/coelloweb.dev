<div class="container">
    <div class="margin-block-14">
        <h2 class="ff-display fs-700 text-center">¿Tienes Preguntas?</h2>
        <div
            class="preguntas | container flow"
            x-data="{ openIndex: null }"
        >
            @foreach($preguntas as $index => $item)
                <div
                    class="preguntas__pregunta"
                    role="region"
                >
                    <button class="pregunta-button" @click="openIndex = (openIndex === {{ $index }} ? null : {{ $index }})"                        >
                        {{ $item['pregunta'] }}
                    </button>

                    <div
                        class="preguntas__respuesta"
                        x-show="openIndex === {{ $index }}"
                        x-transition.duration.300ms
                    >
                        @foreach ($item['respuesta'] as $respuesta)
                            <p class="fs-500">{!! $respuesta !!}</p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
