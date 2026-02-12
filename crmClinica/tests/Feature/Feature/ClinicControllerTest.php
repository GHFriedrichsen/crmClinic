<?php

namespace Tests\Feature\Feature;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ClinicControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * Test that the clinics index page can be rendered.
     */
    public function test_clinics_index_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $clinics = Clinic::factory()->count(3)->create();

        $response = $this->get(route('admin.clinics.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.clinics.index');
        $response->assertViewHas('clinics');

        foreach ($clinics as $clinic) {
            $response->assertSee($clinic->nome);
        }
    }

    /**
     * Test that unauthenticated users cannot access the clinics index page.
     */
    public function test_unauthenticated_users_cannot_access_clinics_index(): void
    {
        $response = $this->get(route('admin.clinics.index'));

        $response->assertRedirect('/login');
    }

    /**
     * Test that the clinics create page can be rendered.
     */
    public function test_clinics_create_page_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.clinics.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.clinics.create');
    }

    /**
     * Test that unauthenticated users cannot access the clinics create page.
     */
    public function test_unauthenticated_users_cannot_access_clinics_create_page(): void
    {
        $response = $this->get(route('admin.clinics.create'));

        $response->assertRedirect('/login');
    }

    /**
     * Test that a clinic can be stored.
     */
    public function test_clinic_can_be_stored(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $clinicData = Clinic::factory()->make()->toArray();

        $response = $this->post(route('admin.clinics.store'), $clinicData);

        $response->assertRedirect(route('admin.clinics.index'));
        $this->assertDatabaseHas('clinics', [
            'nome' => $clinicData['nome'],
            'cnpj' => $clinicData['cnpj'],
            'endereco' => $clinicData['endereco'],
        ]);
        $response->assertSessionHas('success', 'Clinic created successfully.');
    }

    /**
     * Test clinic store validation errors.
     */
    public function test_clinic_store_validation_errors(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('admin.clinics.store'), [
            'nome' => '',
            'cnpj' => '',
            'endereco' => '',
        ]);

        $response->assertSessionHasErrors(['nome', 'cnpj', 'endereco']);
        $response->assertStatus(302); // Redirect back to form with errors
    }

    /**
     * Test that the clinic show page can be rendered.
     */
    public function test_clinic_show_page_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $clinic = Clinic::factory()->create();

        $response = $this->get(route('admin.clinics.show', $clinic->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.clinics.show');
        $response->assertViewHas('clinic');
        $response->assertSee($clinic->nome);
        $response->assertSee($clinic->cnpj);
        $response->assertSee($clinic->endereco);
    }

    /**
     * Test that unauthenticated users cannot access the clinic show page.
     */
    public function test_unauthenticated_users_cannot_access_clinic_show_page(): void
    {
        $clinic = Clinic::factory()->create();
        $response = $this->get(route('admin.clinics.show', $clinic->id));

        $response->assertRedirect('/login');
    }
}
