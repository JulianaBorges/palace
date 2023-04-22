<?php

use App\Http\Livewire\SearchZipcode;
use Illuminate\Support\Facades\Route;


Route::get( uri: '/', action: SearchZipcode::class)->name(name: 'search-zipcode');
