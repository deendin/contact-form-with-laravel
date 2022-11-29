<?php

namespace App\Actions\Contact;

use App\Models\Contact;

class CreateContact
{
    /**
     * Creates the contact model.
     * 
     */
    public function create(array $data)
    {
        $contact = new Contact;

        $contact->name = $data['name'];
        $contact->email_address = $data['email_address'];
        $contact->message = $data['message'];
        
        $contact->save();

        return $contact;
    }
}