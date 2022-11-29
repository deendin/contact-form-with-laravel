<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactRepositoryInterface as Contract;
use App\Models\Contact;

class ContactRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return Contact::latest()->paginate(10);
    }
}