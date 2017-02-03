<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeneralAppTest extends TestCase
{
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


}
