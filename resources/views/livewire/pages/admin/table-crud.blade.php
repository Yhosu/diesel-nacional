<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="d-block">
            @if ($items)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach ($fields as $head)
                                    <th>{{ $head->comment }}</th>
                                @endforeach
                                <th style="min-width: 150px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    @foreach ($fields as $head)
                                        <td>{{ $item[$head->name] }}</td>
                                    @endforeach
                                    <td style="min-width: 150px">
                                        <div wire:ignore class="d-block">
                                            <a href="{{ route('form-crud', ['node' => $node_name, 'action' => 'edit', 'id' => $item['id']]) }}" class="btn btn-icon btn-flat-success waves-effect">
                                                <x-cy-icon-feather icon="edit" />
                                            </a>
                                            {{-- <a href="{{ route('form-crud', ['node' => $node_name, 'action' => 'read', 'id' => $item['id']]) }}" class="btn btn-icon btn-flat-info waves-effect">
                                                <x-cy-icon-feather icon="eye" />
                                            </a> --}}
                                            <button onclick="removeItem('{{ $item['id'] }}', '{{ $node_name }}')" role="button" class="btn btn-icon btn-flat-danger waves-effect">
                                                <x-cy-icon-feather icon="trash" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginator px-2">
                        {{ $items->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            function removeItem(id, node_name) {
                if (id) {
                    Swal.fire({
                        title: 'Confirmación',
                        text: `¿Deseas eliminar el ítem con ID "${id}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `{{ route('form-crud', ['node' => '_NODE_', 'action' => 'delete', 'id' => '_ID_']) }}`
                                .replace('_NODE_', node_name)
                                .replace('_ID_', id);
                        }
                    });
                }
            }
        </script>
    @endpush
</x-admin-layout>
