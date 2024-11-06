<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<div class="vuelo-card">
    <div class="vuelo-image">
        <img src="{{ asset($image) }}" alt="vuelo">
    </div>
    <div class="vuelo-info">
        <h2>{{ $name }}</h2>
        <p>Origen: {{ $origen }}</p>
        <p>Destino: {{ $destiny }}</p>
        <button class="details-button">Detalles</button>
    </div>
</div>
