<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\MainContactMailable;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;

class MainContactForm extends Component
{
    #[Validate]
    public $nombre;
    public $email;
    public $detalles;
    public $selectedOption = '';
    public $referencia;

    protected $rules = [
        'nombre' => 'required|min:3',
        'email' => 'required|email',
        'detalles' => 'required|min:10',
        'referencia' => 'min:3',
        'selectedOption' => 'required',
    ];

    public function updated($rules)
    {
        $this->validateOnly($rules);
    }

    protected function messages()
    {
        return [
            'nombre.required' => 'Tu nombre es muy corto, el campo debe contener al menos 3 caracteres.',
            'email.required' => 'Este campo es obligatorio.',
            'detalles.required' => 'Este campo debe contener al menos 10 caracteres.',
            'referencia.min' => 'Este campo debe contener al menos 3 caracteres.',
            'selectedOption.required' => 'Por favor, seleccione una opción.',
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // Send the email using the Mailable class
        Mail::to('coelloweb@aol.com')->send(new MainContactMailable($validatedData));
        
        $this->reset();

        $this->dispatch('openGraciasModal');

        // session()->flash('message', '¡Gracias por tu interés!');

    }

    public function render()
    {
        return view('livewire.main-contact-form');
    }
}
