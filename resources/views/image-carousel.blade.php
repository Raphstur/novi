<div style="position: relative; width: 100%; height: {{ $height ?? '400px' }}; overflow: hidden" class="{{ $className ?? '' }}">
    @if(empty($images))
        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background-color: #f3f4f6">
            <i class="fas fa-baby" style="font-size: 48px; color: #9b87f5"></i>
            <p style="margin-left: 10px; color: #6b7280">Aucune image disponible</p>
        </div>
    @else
        @foreach($images as $index => $src)
            <div 
                x-show="currentIndex === {{ $index }}"
                x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                style="
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-image: linear-gradient({{ $overlay ?? 'rgba(0, 0, 0, 0.7)' }}, {{ $overlay ?? 'rgba(0, 0, 0, 0.7)' }}), url({{ $src }});
                    background-size: cover;
                    background-position: center;
                "
            ></div>
        @endforeach
        
        @if(count($images) > 1)
            <div style="
                position: absolute;
                bottom: 15px;
                left: 0;
                right: 0;
                display: flex;
                justify-content: center;
                gap: 8px;
            ">
                @foreach($images as $index => $src)
                    <button
                        @click="currentIndex = {{ $index }}"
                        style="
                            width: 10px;
                            height: 10px;
                            border-radius: 50%;
                            border: none;
                            cursor: pointer;
                            padding: 0;
                            transition: background-color 0.3s ease;
                        "
                        :style="currentIndex === {{ $index }} ? 'background-color: #FEF7CD' : 'background-color: rgba(255, 255, 255, 0.5)'"
                        aria-label="Slide {{ $index + 1 }}"
                    ></button>
                @endforeach
            </div>
        @endif
    @endif
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageCarousel', () => ({
            currentIndex: 0,
            interval: {{ $interval ?? 5000 }},
            init() {
                setInterval(() => {
                    this.currentIndex = (this.currentIndex + 1) % {{ count($images ?? []) }};
                }, this.interval);
            }
        }));
    });
</script>