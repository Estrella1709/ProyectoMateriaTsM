<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<div class="hotel-card">
    <div class="hotel-image">
        <img src="{{ asset($image) }}" alt="Hotel">
    </div>
    <div class="hotel-info">
        <h2>{{ $name }}</h2>
        <p>Categoría <span class="stars">{{ $category }}</span></p>
        <p>Habitaciones: {{ $rooms }}</p>
        <div class="amenities">
            @foreach ($amenities as $amenity)
                <span>{{ $amenity }}</span>
            @endforeach
        </div>
        <button class="details-button">Detalles</button>
    </div>
</div>
