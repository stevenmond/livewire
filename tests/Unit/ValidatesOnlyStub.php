<?php

namespace Tests\Unit;

use Livewire\Component;

class ValidatesOnlyTestComponent extends Component
{
    public string $image = '';
    public string $image_alt = '';
    public string $image_url = '';

    public $rules = [
        'image' => 'required_without:image_url|string',
        'image_alt' => 'required|string',
        'image_url' => 'required_without:image|string'
    ];

    public function mount($image, $imageAlt, $imageUrl = '')
    {
        $this->image = $image;
        $this->image_alt = $imageAlt;
        $this->image_url = $imageUrl;
    }

    public function runValidation()
    {
        $this->validate();
    }

    public function runValidateOnly($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function runResetValidation()
    {
        $this->resetValidation();
    }

    public function render()
    {
        return view('null-view');
    }
}
