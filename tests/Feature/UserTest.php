<?php

namespace Tests\Feature;

use Tests\TestCase;

const PASSWORD = "!!HelloWorldpass50/!!";
const JSON_MESSAGE_STRUCTURE = [
    "error",
    "message",
];
class UserTest extends TestCase
{
    /**
     * A basic feature test without body.
     */
    public function test_empty_field(): void
    {
        $response = $this->post('/api/user');
        $response->assertStatus(400);
    }
    /**
     * A basic feature test email field.
     */
    public function test_email_field(): void
    {
        $response = $this->post('/api/user', ['name' => 'Sally', "pwss" => PASSWORD]);
        $response->assertStatus(400);
        $response->assertJsonIsObject();
        $response->assertJsonStructure(JSON_MESSAGE_STRUCTURE);
        $response->assertJsonPath('error', true);
        $response->assertJsonPath('message', 'The email field is required.');

    }

    /**
     * A basic feature test email invalid.
     */
    public function test_email_invalid_field(): void
    {
        $response = $this->post('/api/user', ['name' => 'Sally', "email" => "ezequiel_guerra", "pwss" => PASSWORD]);
        $response->assertStatus(400);
        $response->assertJsonIsObject();
        $response->assertJsonStructure(JSON_MESSAGE_STRUCTURE);
        $response->assertJsonPath('error', true);
        $response->assertJsonPath('message', 'The email field must be a valid email address.');
    }

    /**
     * A basic feature test name field.
     */
    public function test_name_field(): void
    {
        $response = $this->post('/api/user', ["email" => "ezequiel_guerra@gmail.com", "pwss" => PASSWORD]);
        $response->assertStatus(400);
        $response->assertJsonIsObject();
        $response->assertJsonStructure(JSON_MESSAGE_STRUCTURE);
        $response->assertJsonPath('error', true);
        $response->assertJsonPath('message', 'The name field is required.');

    }

    /**
     * A basic feature test name invalid.
     */
    public function test_name_invalid_field(): void
    {
        $response = $this->post('/api/user', ['name' => 'S', "email" => "ezequiel_guerra@gmail.com", "pwss" => PASSWORD]);
        $response->assertStatus(400);
        $response->assertJsonIsObject();
        $response->assertJsonStructure(JSON_MESSAGE_STRUCTURE);
        $response->assertJsonPath('error', true);
        $response->assertJsonPath('message', 'The name field must be at least 2 characters.');
    }

    /**
     * A basic feature test create users.
     */
    public function test_create(): void
    {
        $response = $this->post('/api/user', ['name' => 'Sally', "email" => "ezequiel_guerra@gmail.com", "pwss" => PASSWORD]);
        $response->assertStatus(201);
        $response->assertJsonIsObject();
        $response->assertJsonStructure(JSON_MESSAGE_STRUCTURE);
        $response->assertJsonPath('error', false);
        $response->assertJsonPath('message', 'created user.');
    }
}
