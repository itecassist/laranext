<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Organisation;
use Livewire\Attributes\Validate;

class OrganisationForm extends Form
{
    public ?Organisation $organisation = null;

    #[Validate('required')]
    public $creator_id = '';
    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $seo_name = '';
    #[Validate('required', 'email')]
    public $email = '';
    #[Validate('required')]
    public $phone = '';
    #[Validate('file|nullable')]
    public $logo = '';
    #[Validate('url|nullable')]
    public $website = '';
    #[Validate('required|boolean')]
    public $free_trail = 1;
    #[Validate('date|nullable')]
    public $free_trail_end_date = '';
    #[Validate('required|boolean')]
    public $is_public = 0;
    #[Validate('required|boolean')]
    public $is_active = 1;

    public function save()
    {
        $this->validate();
        Organisation::create($this->pull());
    }

    public function update()
    {
        $this->validate();
        $this->organisation->update($this->pull());
    }

    public function setOrganisation(Organisation $organisation)
    {
        $this->creator_id = $organisation->creator_id;
        $this->name = $organisation->name;
        $this->seo_name = $organisation->seo_name;
        $this->email = $organisation->email;
        $this->phone = $organisation->phone;
        $this->logo = $organisation->logo;
        $this->website = $organisation->website;
        $this->free_trail = $organisation->free_trail;
        $this->free_trail_end_date = $organisation->free_trail_end_date;
        $this->is_public = $organisation->is_public;
        $this->is_active = $organisation->is_active;
    }
}
