@props(['Data'])

<div id="carouselExampleInterval" class="carousel slide rounded-lg shadow-lg overflow-hidden" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($Data as $index => $carouselDetails)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="5000">
                <img src="{{ asset('storage/' . $carouselDetails->image) }}" class="d-block w-100 carousel-image" alt="Carousel Image">

                @if(!empty($carouselDetails->caption))
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-lg p-4 animate__animated animate__fadeInUp">
                        <h5 class="text-white fw-bold">{{ $carouselDetails->caption }}</h5>
                        @if(!empty($carouselDetails->description))
                            <p class="text-light mb-0">{{ $carouselDetails->description }}</p>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Navigation Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon custom-nav-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon custom-nav-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

    <!-- Indicators -->
    <div class="carousel-indicators">
        @foreach($Data as $index => $carouselDetails)
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
</div>
<style>
.carousel{
    top:-60px;
}
    /* Carousel Image */
.carousel-image {
    height: 500px;
    object-fit: cover;
    border-radius: 12px;
}

/* Caption Styling */
.carousel-caption {
    background: rgba(0, 0, 0, 0.6);
    border-radius: 8px;
    backdrop-filter: blur(5px);
}

/* Navigation Buttons */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 50%;
    width: 40px;
    height: 40px;
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: rgba(255, 255, 255, 0.9);
}

/* Indicators */
.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
}

.carousel-indicators .active {
    background-color: #007bff;
}

/* Smooth Animations */
.carousel-item {
    transition: transform 0.8s ease, opacity 0.8s ease;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .carousel-image {
        height: 300px;
    }

    .carousel-caption {
        font-size: 0.9rem;
        padding: 0.75rem;
    }
}

</style>