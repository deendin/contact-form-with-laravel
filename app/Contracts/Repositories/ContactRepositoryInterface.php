<?php

namespace App\Contracts\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

interface ContactRepositoryInterface
{
    /**
     * Finds all of the contacts.
     * 
     */
    public function findAll();

}