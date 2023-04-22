<div>
    <x-notifications/>
    <form class="p-8 bg-red-200 flex flex-col mx-auto w-1/2 gap-4">
        <h1>Buscado de CEP</h1>
        <div>
            <label for="zipcode">CEP</label>
            <input class="border" id="zipcode" type="text" wire:model.lazy="zipcode"/>            
            @error('zipcode')
                <p class="text-red-500">{{ $message }}</p>
            @enderror        
        </div>
        <div>
            <label for="street">Rua</label>
            <input class="border" id="street" type="text" wire:model="street">
            @error('street')
                <p class="text-red-500">{{ $message }}</p>
            @enderror 
        </div>
        <div>
            <label for="neighborhood">Bairro</label>
            <input class="border" id="neighborhood" type="text" wire:model="neighborhood"/>
            @error('neighborhood')
                <p class="text-red-500">{{ $message }}</p>
            @enderror 
        </div>
        <div>
            <label for="city">Cidade</label>
            <input class="border" id="city" type="text" wire:model="city"/>
            @error('city')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="state">estado</label>
            <input class="border" id="state" type="text" wire:model="state"/>
            @error('state')
                <p class="text-red-500">{{ $message }}</p>
            @enderror 
        </div>
        <div>
            <button 
                class="px-4 py-2 bg-green-50 hover:bg-slate-400 text-wite rounded-md" 
                type="button"  
                wire:click="cancel">
                Cancelar
            </button>
            <button 
                class="px-4 py-2 bg-green-50 hover:bg-green-400 text-wite rounded-md" 
                type="button"  
                wire:click="save">
                Salvar Endereço
            </button>
        </div>
    </form>
    <hr class="m-6">
    
        <div class="container mx-auto grid justify-items-start">        
            <div class="ml-6">
                <p class="text-3xl font-bold">Endereços Cadastrados</p>
            
                <table class="border-collapse mt-6">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">CEP</th>
                            <th class="px-4 py-2">RUA</th>
                            <th class="px-4 py-2">BAIRRO</th>
                            <th class="px-4 py-2">CIDADE</th>
                            <th class="px-4 py-2">ESTADO</th>
                            <th class="px-4 py-2">AÇÕES</th>
            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addresses as $address)
                            <tr class="odd:bg-white even:bg-slate-50">
                                <td class="border px-4 py-2">{{ $address['zipcode'] }}</td>
                                <td class="border px-4 py-2">{{ $address['street'] }}</td>
                                <td class="border px-4 py-2">{{ $address['neighborhood'] }}</td>
                                <td class="border px-4 py-2">{{ $address['city'] }}</td>
                                <td class="border px-4 py-2">{{ $address['state'] }}</td> 
                                <td class="border px-4 py-2">
                                    <button class="text-blue-500 m-1" wire:click="edit" type="button">Editar</button>
                                    <button class="text-red-500 m-1" wire:click="remove" type="button">Excluir</button>
                                </td>                    
                            </tr>      
                        @endforeach
                        
                    </tbody>    
            
                </table>
             </div>
        </div>   
</div>
