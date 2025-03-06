<?php

namespace App\Livewire\Components\CrudAdmin;

use Livewire\Component;
use Illuminate\Http\Request as HttpRequest;

class FormCrud extends Component
{
    public $node_name;
    public $action;
    public $id;

    public $item = [];
    public $node = [];

    public $form = [];

    public function mount($node_name, $action, $id = null)
    {
        $this->node_name = $node_name;
        $this->action = $action;
        $this->id = $id;
    }

    public function submit()
    {
        if ($this->action !== 'read') {
            if ($this->id) {
                $this->form['id'] = $this->id;
            }

            $result = app('App\Http\Controllers\ProcessController')->postNode($this->node_name, $this->action, $this->form);
            if ($result['status']) {
                session()->flash('crud_success', $result['message']);
            } else {
                if (isset($result['errors']) && is_array($result['errors']) && !empty($result['errors'])) {
                    $this->dispatch('alertErrors', $result);
                } else {
                    session()->flash('crud_error', ($result['message'] ?? trans('responses.error.default')));
                }
            }
        }
    }

    public function render()
    {
        $node = \Node::where('name', $this->node_name)->firstOrFail();
        $item = null;

        if ($this->id && $this->action !== 'create') {
            $item = ($node->model)::findOrFail($this->id);
        }

        $fields = $node->display_items;
        $this->item = $item;
        $this->node = $node;

        $relations = [];

        foreach ($fields ?? [] as $field) {
            if ($field->type !== 'password') {
                $this->form[$field->name] = $this->item[$field->name] ?? null;
            } else {
                $this->form[$field->name] = null;
            }

            if ($field->relation_model) {
                $relationModel = $field->relation_model;
                $relationCount = $relationModel::count(); // Obtener el conteo total
                if ($relationCount <= 30) {
                    $relationData = $relationModel::all();
                    $relations[$field->name] = ['data' => $relationData, 'ajax' => false];
                } else {
                    $relationData = [$relationModel::find($this->item[$field->name])];
                    $relations[$field->name] = ['data' => $relationData, 'ajax' => true];
                }
            }
        }

        return view('livewire.components.crud-admin.form-crud', [
            'fields'    => $fields,
            'action'    => $this->action,
        ]);
    }
}