<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeneralAppTest extends TestCase
{
  use DatabaseTransactions;

  public function testDefaultRoute()
  {
    $response = $this->get('/');
    $response->assertStatus(200);
  }
  public function testHomeRoute()
  {
    $response = $this->get('/home');
    $response->assertStatus(302);
  }
  public function testRegisterRoute()
  {
    $response = $this->get('/register');
    $response->assertStatus(302);
  }
  public function testClustervaluesRoute()
  {
    $response = $this->get('/clustervalues');
    $response->assertStatus(302);
  }
  public function testMessagesRoute()
  {
    $response = $this->get('/messages');
    $response->assertStatus(302);
  }
  public function testProductsRoute()
  {
    $response = $this->get('/products');
    $response->assertStatus(302);
  }
  public function testUserAccountRoute()
  {
    $response = $this->get('/useraccount');
    $response->assertStatus(302);
  }
  public function testloginRoute()
  {
    $response = $this->get('/login');
    $response->assertStatus(200);
  }

  public function testlogOutRoute()
  {
    $response = $this->get('/logout');
    $response->assertStatus(405);
  }
  public function testForgotPasswordRoute()
  {
    $response = $this->get('/password/reset');
    $response->assertStatus(200);
  }

  /* API Tests*/

  public function testClusterValuesSegmentRoute()
  {
    $user = factory(\App\User::class)->create();

    $response = $this->actingAs($user, 'api')->get('/api/clustervalues/d/1');
    $response->assertStatus(200);
  }

  public function testClustervalUesupdateRouteGET()
  {
    $user = factory(\App\User::class)->create();
    $response = $this->actingAs($user, 'api')->get('/api/clustervalues/update');
    $response->assertStatus(405);
  }

  public function testClustervalUesupdateRoutePOSTSucess()
  {
    $user = factory(\App\User::class)->create();
    $value = '-0.024252530508';
    $response = $this->actingAs($user, 'api')->post('/api/clustervalues/update',
    ['id'=>1, 'name'=> 'd1_married_couple_family',
    'value' => $value]);
    $response->assertStatus(200);
    $response->assertJson(['status' => 'sucess', 'value'=>$value, 'message' => '']);
  }

  public function testClustervalUesupdateRoutePOSTFail()
  {
    $user = factory(\App\User::class)->create();
    $value = '-0.024252530508Notallowedstrings';
    $response = $this->actingAs($user, 'api')->post('/api/clustervalues/update',
    ['id'=>1, 'name'=> 'd1_married_couple_family',
    'value' => $value]);
    $response->assertStatus(200);
    $response->assertJson(['status' => 'failed']);
  }


}
