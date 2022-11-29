<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Models\Contact;

class ContactTest extends TestCase
{
    /**
     * Tests contact can be created.
     *
     * @return void
     */
    public function test_contact_can_be_created()
    {
        $contact = \App\Models\Contact::factory()->create();

        $response = $this->post(route('contact.create'), [
            'name' => $contact->name,
            'email_address' => $contact->email_address,
            'message' => $contact->message,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contacts', [
            'name' => $contact->name,
            'email_address' => $contact->email_address
        ]);

        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Contact created successfully.', $response['message']);
    }

    /**
     * Tests contact can be retrieved.
     *
     * @return void
     */
    public function test_contact_can_be_retrieved()
    {
        $response = $this->get(route('contact.index'));

        $response->assertStatus(200);

        $this->assertEquals('success', $response['status']);

        $this->assertEquals('Contacts fetched successfully.', $response['message']);
    }
}
