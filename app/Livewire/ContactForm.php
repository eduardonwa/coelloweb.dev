<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\SolicitudMailable;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    #[Validate]
    public $nombre;
    public $email;
    public $entidad;
    public $tipoProyecto;
    public $prototipoURL;
    public $plazoEntrega;
    public $numeroPaginas;
    public $detalles;
    public $budget;

    protected $rules = [
        'nombre' => 'required|min:6',
        'email' => 'required|email',
        'entidad' => 'required',
        'tipoProyecto' => 'required',
        'prototipoURL' => 'url',
        'plazoEntrega' => 'required',
        'numeroPaginas' => 'required',
        'detalles' => 'min:6',
        'budget' => 'required'
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        Mail::to('coelloweb@aol.com')->send(new SolicitudMailable($validatedData));

        session()->flash('message', '¡Gracias por tu interés!');

        return redirect()->to('/gracias');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
