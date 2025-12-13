<div id="nuevoEventoModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 hidden overflow-y-auto overflow-x-hidden bg-slate-900/60 backdrop-blur">
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-xl rounded-2xl border border-slate-800/70 bg-slate-900 text-slate-100 shadow-2xl shadow-slate-950/50">
            <div class="flex items-center justify-between border-b border-slate-800/70 px-6 py-4">
                <h5 class="text-lg font-semibold">Nuevo evento</h5>
                <button type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-800/60 bg-slate-900/70 p-2 text-slate-400 transition duration-200 hover:border-slate-700 hover:text-slate-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500" data-modal-hide="nuevoEventoModal" aria-label="Cerrar">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="px-6 py-5">
                <form id="nuevoEventoForm" action="{{ route('eventos.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <label for="nombreEvento" class="text-sm font-medium text-slate-300">Nombre del evento</label>
                        <input type="text" id="nombreEvento" name="nombreEvento" class="w-full rounded-xl border border-slate-800/60 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="space-y-2">
                            <label for="fechaEvento" class="text-sm font-medium text-slate-300">Fecha</label>
                            <input type="date" id="fechaEvento" name="fecha" class="w-full rounded-xl border border-slate-800/60 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="space-y-2">
                            <label for="horaEvento" class="text-sm font-medium text-slate-300">Hora</label>
                            <input type="time" id="horaEvento" name="hora" class="w-full rounded-xl border border-slate-800/60 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="ubicacionEvento" class="text-sm font-medium text-slate-300">Ubicación</label>
                        <input type="text" id="ubicacionEvento" name="ubicacion" class="w-full rounded-xl border border-slate-800/60 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="space-y-2">
                        <label for="estadoEvento" class="text-sm font-medium text-slate-300">Estado</label>
                        <select id="estadoEvento" name="estado" class="w-full rounded-xl border border-slate-800/60 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Activo">Activo</option>
                            <option value="Programado">Programado</option>
                            <option value="Finalizado">Finalizado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end gap-3 pt-4">
                        <button type="button" data-modal-hide="nuevoEventoModal" class="inline-flex items-center gap-2 rounded-xl border border-slate-800/60 bg-slate-950/70 px-4 py-2 text-sm font-medium text-slate-300 transition duration-200 hover:border-slate-700 hover:text-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">Cancelar</button>
                        <button type="submit" id="guardarEvento" class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-transform duration-200 hover:scale-[1.02] hover:bg-blue-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

