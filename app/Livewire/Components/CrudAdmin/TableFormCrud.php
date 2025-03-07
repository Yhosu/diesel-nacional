<?php

namespace App\Livewire\Components\CrudAdmin;

use Livewire\Component;

class TableFormCrud extends Component
{
    public $fields = [];
    public $item;
    public $node;

    public $form = [];

    public function mount($fields = [], $item, $node)
    {
        $this->fields   = $fields;
        $this->item     = $item;
        $this->node	    = $node;
    }

    public function submit()
    {
        
    }

    public function updateForm()
    {
        $fields = $this->fields;
        foreach ($fields ?? [] as $field) {
            if ($field->type !== 'password') {
                $this->form[$field->name] = $this->item[$field->name] ?? null;
            } else {
                $this->form[$field->name] = null;
            }
        }

        $this->fields = $fields;
    }

    public function render()
    {
        $this->updateForm();

        return view('livewire.components.crud-admin.table-form-crud', [
            'fields'  => $this->fields,
            'item'    => $this->item,
            'node'	  => $this->node,
        ]);
    }
}