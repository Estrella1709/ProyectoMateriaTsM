<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: "{{ $title }}",
            text: "{{ $text }}",
            icon: "{{ $icon ?? 'success' }}" // Puedes hacer que el icono sea opcional.
        });
    });
</script>
