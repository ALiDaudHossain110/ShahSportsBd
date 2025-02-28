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
<style>
    /* Brand Slider Container */
.brand-slider-container {
    width: 100%;
    height: 20vh;
    overflow: hidden;
    position: relative;
    background: #f8f9fa;
    border-top: 2px solid #e0e0e0;
    border-bottom: 2px solid #e0e0e0;
}

/* Slider Track */
.brand-slider-track {
    display: flex;
    width: calc(200%);
    animation: scrollLeft 30s linear infinite;
}

/* Brand Logos */
.brand-logo {
    flex: 0 0 auto;
    width: 150px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 20px;
    transition: transform 0.3s ease;
    text-decoration: none;
}

/* Images */
.brand-logo img {
    max-height: 80%;
    max-width: 100%;
    object-fit: contain;
}

/* Hover Effect */
.brand-logo:hover {
    transform: scale(1.1);
}

/* Scroll Animation */
@keyframes scrollLeft {
    0% {
        transform: translateX(50%);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .brand-logo {
        width: 100px;
        padding: 0 10px;
    }

    .brand-slider-container {
        height: 15vh;
    }
}

</style>