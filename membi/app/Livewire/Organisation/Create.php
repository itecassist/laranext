<?php

namespace App\Livewire\Organisation;

use App\Livewire\Forms\OrganisationForm;
use App\Models\Organisation;
use Livewire\Component;

class Create extends Component
{
    public OrganisationForm $form;

    public function mount(Organisation $organisation)
    {
        $this->form->setOrganisation($organisation);
    }

    public function save()
    {
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.organisation.create');
    }
}
