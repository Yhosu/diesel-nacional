<div class="d-block">
    @if (session()->has('message_success'))
        <x-cy-alert type="success">
            {{ session('message_success') }}
        </x-cy-alert>
    @elseif(session()->has('message_error'))
        <x-cy-alert type="error">
            {{ session('message_error') }}
        </x-cy-alert>
    @endif
    
    <form method="POST" class="row gy-1" wire:submit.prevent="submit">
        @foreach ($fields as $key => $field)
            <x-capyei.field
                label="{{ $field->comment }}"
                type="{{ $field->type }}"
                name="{{ $field->name }}"
                propertyField='wire:model.defer="form.{{ $field->name }}"'
                id="{{ $field->name.'-'.$key }}"
                placeholder="{{ $field->placeholder ?? '' }}"
                required="{{ $field->required ?? false }}"
                :errors="$errors->get(''.$field->name.'')"
                {{-- :value="$item[$field->name]" --}}
                class="col-12 col-md-6"
            />
        @endforeach
    
        @if ($action !== 'read')
            <div class="col-12">
                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">{{ __(''.$action.'') }}</button>
            </div>
        @endif
    </form>
</div>