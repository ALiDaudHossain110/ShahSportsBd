@props(['Data'])

<div class="brand-slider-container">
    <div class="brand-slider-track">
        @foreach($Data as $brand)
            <a href="{{ $brand->link ?? '#' }}" class="brand-logo" target="_blank">
                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" />
            </a>
        @endforeach

        <!-- Duplicate logos for seamless looping -->
        @foreach($Data as $brand)
            <a href="{{ $brand->link ?? '#' }}" class="brand-logo" target="_blank">
                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" />
            </a>
        @endforeach
    </div>
</div>
