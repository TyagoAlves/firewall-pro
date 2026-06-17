<?php
namespace Tests\Feature;

use Tests\TestCase;

class SiteControllerTest extends TestCase
{
    public function test_home_page(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_features_page(): void
    {
        $this->get('/features')->assertStatus(200);
    }

    public function test_documentation_page(): void
    {
        $this->get('/documentation')->assertStatus(200);
    }

    public function test_pricing_page(): void
    {
        $this->get('/pricing')->assertStatus(200);
    }

    public function test_security_page(): void
    {
        $this->get('/security')->assertStatus(200);
    }

    public function test_contact_page(): void
    {
        $this->get('/contact')->assertStatus(200);
    }
}
