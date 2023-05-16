<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AbonnetTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('api/abonne');

        $response->assertStatus(200);
    }

    public function insertAbonne(){

        $response = $this->withHeaders(["X-Header"=> "value"])
        ->post("api/abonne", ["nom"=> "unit","prenom"=>"unit", "age"=>"unit", "sexe"=>"unit", "profession"=>"unit","rue"=>"unit" ]);
        $response -> assertStatus(200);
    }

    public function deleteAbonne(){
        $response = $this->withHeaders(["X-Header"=> "value"])
        ->delete("api/abonne", ["nom"=> "unit","prenom"=>"unit", "age"=>"unit", "sexe"=>"unit", "profession"=>"unit","rue"=>"unit" ]);
        $response -> assertStatus(200);
    }

    public function updateAbonne(){
        $response = $this->withHeaders(["X-Header"=> "value"])
        ->put("api/abonne", ["nom"=> "unit","prenom"=>"unit", "age"=>"unit", "sexe"=>"unit", "profession"=>"unit","rue"=>"unit" ]);
        $response -> assertStatus(200);
    }
}
