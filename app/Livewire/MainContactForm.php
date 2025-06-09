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
    public $phone;
    public $detalles;
    public $selectedOption = '';
    public $referencia;

    protected $rules = [
        'nombre' => 'required|min:3',
        'email' => 'required|email',
        'selectedOption' => 'required',
        'phone' => 'required|digits:10',
    ];

    public function updated($rules)
    {
        $this->validateOnly($rules);
    }

    protected function messages()
    {
        return [
            // Mensajes genéricos para reglas comunes
            'required' => 'Este campo es obligatorio.',
            'min' => 'Este campo debe contener al menos :min caracteres.',
            
            // Mensajes específicos que sobrescriben los genéricos
            'email.email' => 'Ingresa un correo electrónico válido',
            'phone.digits' => 'El teléfono debe tener 10 dígitos numéricos.',
            'selectedOption.required' => 'Por favor, selecciona una opción.',

            // Mensajes personalizados para campos específicos
            'nombre.min' => 'Tu nombre es muy corto, debe contener al menos 3 caracteres.',
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        Mail::to('coelloweb@aol.com')->send(new MainContactMailable($validatedData));

        session()->flash('message', '¡Gracias por tu interés!');

        return redirect()->route('gracias');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.main-contact-form');
    }
}
