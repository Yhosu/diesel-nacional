<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="d-block">
            {{-- @livewire('components.crud-admin.table-form-crud', [
                'fields'  => $filters,
                'node'    => $node_name,
            ]) --}}
            <div class="card-body">
                <h5 class="card-subtitle mb-1">{{ __('diesel.filters') }}</h5>
                <form method="GET" class="row gy-1" action="">
                    @foreach ($filters as $key => $field)
                        <x-capyei.field
                            label="{{ $field->comment }}"
                            type="{{ $field->type }}"
                            name="{{ $field->name }}"
                            id="{{ $field->name.'-'.$key }}"
                            placeholder="{{ $field->placeholder ?? '' }}"
                            required="{{ $field->required ?? false }}"
                            :options="$field->options"
                            :errors="$errors->get(''.$field->name.'')"
                            class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"
                        />
                    @endforeach
                
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 align-self-end">
                        <button type="submit" class="btn btn-icon btn-primary waves-effect waves-float waves-light" title="{{ __('filter') }}">
                            <x-cy-icon-feather icon="filter" />
                        </button>
                    </div>
                </form>
            </div>
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
                                        <td style="overflow: hidden; max-width: 120ch; white-space: nowrap;">{{ $item[$head->name] }}</td>
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
