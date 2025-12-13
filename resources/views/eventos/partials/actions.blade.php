<div class="flex justify-center gap-2">
    <a href="{{ route('eventos.show', $evento) }}" class="btn-icon bg-blue-600 hover:bg-blue-700" title="Ver detalles" aria-label="Ver detalles del evento {{ $evento->nombreEvento }}">
        <i class="ph ph-eye w-4 h-4 text-white"></i>
    </a>
    <button type="button" class="btn-icon bg-slate-700 hover:bg-slate-800" title="Editar evento" aria-label="Editar evento {{ $evento->nombreEvento }}">
        <i class="ph ph-pencil w-4 h-4 text-white"></i>
    </button>
    <button type="button" class="btn-icon bg-red-600 hover:bg-red-700" title="Eliminar evento" aria-label="Eliminar evento {{ $evento->nombreEvento }}">
        <i class="ph ph-trash w-4 h-4 text-white"></i>
    </button>
</div>
