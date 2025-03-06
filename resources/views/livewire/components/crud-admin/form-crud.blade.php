<div class="d-block">
    @if (session()->has('crud_success'))
        <x-cy-alert type="success">
            {{ session('crud_success') }}
        </x-cy-alert>
    @elseif(session()->has('crud_error'))
        <x-cy-alert type="error">
            {{ session('crud_error') }}
        </x-cy-alert>
    @endif
    
    <form method="POST" class="row gy-1" wire:submit.prevent="submit">
        @foreach ($fields as $field)
            <x-capyei.field
                label="{{ $field->label }}"
                type="{{ $field->type }}"
                name="{{ $field->name }}"
                propertyField='wire:model.defer="form.{{ $field->name }}"'
                id="{{ $field->name.'-'.$field->id.'-'.$field->id }}"
                placeholder="{{ $field->placeholder }}"
                required="{{ $field->required }}"
                :errors="$errors->get(''.$field->name.'')"
                class="col-12 col-md-{{ $field->col }}"
            />
        @endforeach
    
        @if ($action !== 'read')
            <div class="col-12">
                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">{{ __(''.$action.'') }}</button>
            </div>
        @endif
    </form>
</div>