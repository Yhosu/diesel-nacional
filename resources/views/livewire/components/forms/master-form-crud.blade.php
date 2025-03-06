<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

new class extends Component
{
    public $node;
    public $action;
    public $id;

    public $data = [];
    public $form = [];

    public function mount($node, $action, $id = null)
    {
        $this->node = $node;
        $this->action = $action;
        $this->id = $id;

        $exclude_columns = [
            'id', 'created_at', 'updated_at', 'deleted_at', 'remember_token'
        ];

        if ($id && ($action === 'edit' || $action === 'read')) {
            $this->data = \DB::table($node)->find($id);
            $this->data = collect($this->data)->except($exclude_columns)->toArray();
            // foreach ($this->data ?? [] as $key => $value) {
            //     if($key !== 'password') {
            //         $this->form[$key] = $value;
            //     }
            // }
        } else if($action === 'create') {
            $columns = \Schema::getColumnListing($node);
            $this->data = array_values(array_diff($columns, (array) $exclude_columns));
        }
    }

    public function getDataProperty()
    {
        return $this->data;
    }

    public function submit()
    {
        $method = $this->action === 'create' ? 'createTableCrud' : 'updateTableCrud';

        if($this->id) $this->form['id'] = $this->id;
        $result = app('App\Http\Controllers\ProcessController')->$method($this->node, $this->form);

        Log::info($result);

        session()->flash('success', $this->action === 'create' ? 'Record created successfully!' : 'Record updated successfully!');
    }
};
?>

<form method="POST" class="row gy-1" wire:submit.prevent="submit">
    @csrf
    @if($action === 'edit')
        @method('PUT')
    @endif

    @if($action === 'create')
        @foreach ($this->data ?? [] as $column)
            <x-capyei.field
                label="{{ $column }}"
                type="text"
                name="{{ $column }}"
                propertyField='wire:model.defer="form.{{ $column }}"'
                id="{{ $column }}"
                placeholder="{{ __('enter_your').' '.$column }}"
                required
                :errors="$errors->get(''.$column.'')"
                class="col-12 col-md-6 col-lg-4"
            />
        @endforeach
    @else
        @foreach ($this->data ?? [] as $key => $value)
            <x-capyei.field
                label="{{ $key }}"
                type="text"
                name="{{ $key }}"
                propertyField='wire:model.defer="form.{{ $key }}"'
                id="{{ $key }}"
                placeholder="{{ __('enter_your').' '.$key }}"
                required
                :errors="$errors->get(''.$key.'')"
                class="col-12 col-md-6 col-lg-4"
            />
        @endforeach
    @endif

    @if ($action !== 'read')
        <div class="col-12">
            <button type="submit">{{ $action === 'create' ? 'Crear' : 'Actualizar' }}</button>
        </div>
    @endif
</form>
