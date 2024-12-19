    <!-- proceso -->
    <section class="section">
        <div
            x-data="{
                activeIndex: 0,
                total: {{ count($proceso) }},
                startX: 0,
                swipeThreshold: 50,
                next() {
                    this.activeIndex = (this.activeIndex + 1) % this.total;
                    this.scrollToCurrent();
                },
                prev() {
                    this.activeIndex = (this.activeIndex - 1 + this.total) % this.total;
                    this.scrollToCurrent();
                },
                isActive(index) {
                    return this.activeIndex === index;
                },
                scrollToCurrent() {
                    const slider = this.$refs.slider;
                    slider.scrollTo({
                        left: this.activeIndex * slider.offsetWidth,
                        behavior: 'smooth',
                    });
                },
                handleSwipe(event) {
                    if (event.type === 'touchstart') {
                        this.startX = event.touches[0].clientX; // Registra el inicio
                    }

                    if (event.type === 'touchend') {
                        const endX = event.changedTouches[0].clientX;
                        const diff = endX - this.startX; // Nota: Invertimos la resta

                        // Desliza solo si supera el umbral
                        if (diff > swipeThreshold) {
                            this.prev(); // Retrocede
                        } else if (diff < -swipeThreshold) {
                            this.next(); // Avanza
                        }

                    }
                }
            }"
            @touchstart="handleSwipe($event)"
            @touchend="handleSwipe($event)"
            tabindex="0"
            role="region"
            aria-labelledby="carousel-label"
            class="proceso"
        >
            <h1 class="proceso__encabezado | uppercase ff-wide clr-neutral-100">El proceso</h1>
            <!-- prev, next btns -->
            <div class="proceso__nav-btns | flex-group">
                <button @click="prev" class="round">
                    <span class="fs-600" aria-hidden="true">&#x2190;</span>
                </button>
                <button @click="next" class="round">
                    <span class="fs-600" aria-hidden="true">&#x2192;</span>
                </button>
            </div>

            <ul
                tabindex="0"
                role="listbox"
                aria-labelledby="carousel-content-label"
                class="proceso__inner"
                style="overflow-x: hidden"
                x-ref="slider"
            >
                @foreach ($proceso as $index => $item)
                    <li
                        x-bind:class="{'active': isActive({{ $index }})}"
                        class="flex-group padding-inline-2"
                        role="option"
                    >
                        <img
                            src="{{ $item['imagenUrl'] }}"
                            alt="{{ $item['encabezado'] }}"
                            class="padding-5 mx-auto"
                        >
                        <div class="paso-a-seguir">
                            <h1 class="uppercase ff-display fs-700">{{ $item['encabezado'] }}</h1>
                            @foreach ($item['descripcion'] as $descripcion)
                                <p class="copy-text">{!! $descripcion !!}</p>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>