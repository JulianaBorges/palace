<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Models\address;
use WireUi\Traits\Actions;


class SearchZipcode extends Component
{
    use Actions;

    protected array $rules = [
        'zipcode' => ['required'],
        'street' => ['required'],
        'neighborhood' => ['required'],
        'city' => ['required'],
        'state' =>['required', 'max:2'],
    ];

    protected array $messages = [
        'zipcode' => 'O campo cep é obrigadorio.',
        'street' => 'O campo Logradouro é obrigatorio.',
        'neighborhood' => 'O campo Bairro é obrigatorio.',
        'city' => 'O campo Localidade é obrigatorio.',
        'state' => 'O campo UF é obrigatorio.',
        'state' => 'O campo Estado deve ter exatamente 2 Caracteres',

    ];
    
    public string $zipcode = '';

    public string $street = '';

    public string $neighborhood ='';

    public string $city = '';

    public string $state = '';

    public array $addresses = [];

    public function updatedZipcode(string $value)
    {
        $response = Http::get( url: "viacep.com.br/ws/{$value}/json/")->json();
      
        $this->zipcode = $response['cep'];
        $this->street = $response['logradouro'];
        $this->neighborhood = $response['bairro'];
        $this->city = $response['localidade'];
        $this->state = $response['uf'];
       
    }
    
    public function save(): void
    {
        $this->validate();
        
        Address::updateOrCreate(
            [
                'zipcode' => $this->zipcode,
            ],
            [
                'street' => $this->street,
                'neighborhood' => $this->neighborhood,
                'city' => $this->city,
                'state' => $this->state,
            ]); 

            $this->render();

            $this->resetExcept('addresses');
    }

    public function cancel(): void
    {
        $this->notification()->info(title: 'Cancelar', description:'Sua ação foi cancelada com sucesso!');
        
    }

   
    public function render()
    {
        $this->addresses = address::all()->toArray();

        return view('livewire.search-zipcode');
    }
}
