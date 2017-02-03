<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\ClusterValue as ClusterValue;

class ClusterValueTest extends TestCase
{
  protected $clusterValue;

  protected function setUp()
  {
    parent::setUp();
    $this->clusterValue = new ClusterValue();
  }

  public function testgetTableColumNamesBySegmentNum()
  {
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(1));
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(2));
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(3));
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(4));
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(5));
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(6));
    $this->assertCount(16, $this->clusterValue->getTableColumNamesBySegmentNum(7));
    $this->assertCount(0, $this->clusterValue->getTableColumNamesBySegmentNum(10));
    $this->assertCount(0, $this->clusterValue->getTableColumNamesBySegmentNum("AB"));
  }

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

/*
  public function testsetMedianFamilyHouseholdIncome()
  {
    $this->assertEquals(21110, $this->usersegment->setMedianFamilyHouseholdIncome(21110));
    $this->assertEquals(0, $this->usersegment->setMedianFamilyHouseholdIncome("A"));
  }

  public function testsetMedianEductionAttained()
  {
    $this->assertEquals(118, $this->usersegment->setMedianEductionAttained(118));
    $this->assertEquals(0, $this->usersegment->setMedianEductionAttained("BB"));
  }

  public function testsetMarriedCoupleFamily()
  {
    $this->assertEquals(157, $this->usersegment->setMarriedCoupleFamily(157));
    $this->assertEquals(0, $this->usersegment->setMarriedCoupleFamily("Z34"));
  }

  public function testsetChildHHWithPersons()
  {
    $this->assertEquals(41, $this->usersegment->setChildHHWithPersons(41));
    $this->assertEquals(0, $this->usersegment->setChildHHWithPersons("Z34"));
  }

  public function testsetPopHispanic()
  {
    $this->assertEquals(312, $this->usersegment->setPopHispanic(312));
    $this->assertEquals(0, $this->usersegment->setPopHispanic("Z34"));
  }

  public function testsetPopAsian()
  {
    $this->assertEquals(12, $this->usersegment->setPopAsian(12));
    $this->assertEquals(0, $this->usersegment->setPopAsian("B"));
  }

  public function testsetNumberOfPersonsInUnit()
  {
    $this->assertEquals(4, $this->usersegment->setNumberOfPersonsInUnit(4));
    $this->assertEquals(0, $this->usersegment->setNumberOfPersonsInUnit("BN"));
  }

  public function testsetUrbanCountySizeCode()
  {
    $this->assertEquals(3, $this->usersegment->setUrbanCountySizeCode(3));
    $this->assertEquals(0, $this->usersegment->setUrbanCountySizeCode("X"));
  }

  public function testsetHomePurchaseDate()
  {
    $this->assertEquals(19880416, $this->usersegment->setHomePurchaseDate(19880416));
    $this->assertEquals(0, $this->usersegment->setHomePurchaseDate("Date"));
  }

  public function testsetEstHouseHoldIncome()
  {
    $this->assertEquals("D", $this->usersegment->setEstHouseHoldIncome("D"));
    $this->assertEquals(0, $this->usersegment->setEstHouseHoldIncome(123));
  }

  public function testsetMosaicHousehold()
  {
    $this->assertEquals("S", $this->usersegment->setMosaicHousehold("S"));
    $this->assertEquals(0, $this->usersegment->setMosaicHousehold(123));
  }

  public function testsetHomePurchaseDateConst()
  {
    $this->usersegment->setHomePurchaseDate('-');
    $this->assertEquals(0, $this->usersegment->setHomePurchaseDateConst());
    $this->usersegment->setHomePurchaseDate(19880416);
    $this->assertEquals(19880416, $this->usersegment->setHomePurchaseDateConst());
    $this->usersegment->setHomePurchaseDate('');
    $this->assertEquals(0, $this->usersegment->setHomePurchaseDateConst());
  }

  public function testsetEstimatedHouseIncomeConst()
  {
    $this->usersegment->setEstHouseHoldIncome("A");
    $this->assertEquals(12500, $this->usersegment->setEstimatedHouseIncomeConst());
    $this->usersegment->setEstHouseHoldIncome("G");
    $this->assertEquals(112500, $this->usersegment->setEstimatedHouseIncomeConst());
    $this->usersegment->setEstHouseHoldIncome();
    $this->assertEquals(67000, $this->usersegment->setEstimatedHouseIncomeConst());
    $this->usersegment->setEstHouseHoldIncome(123);
    $this->assertEquals(67000, $this->usersegment->setEstimatedHouseIncomeConst());
  }

  public function testsetMosaicHouseholdConst()
  {
    $this->usersegment->setMosaicHousehold("Q64");
    $this->assertEquals(0, $this->usersegment->setCombnd_Mosaic_Group());
    $this->usersegment->setMosaicHousehold("-");
    $this->assertEquals(0, $this->usersegment->setCombnd_Mosaic_Group());
    $this->usersegment->setMosaicHousehold("A64");
    $this->assertEquals(0, $this->usersegment->setCombnd_Mosaic_Group());

    $this->usersegment->setMosaicHousehold("Q64");
    $this->assertEquals(0, $this->usersegment->setD1_mfirst());
    $this->usersegment->setMosaicHousehold("-");
    $this->assertEquals(0, $this->usersegment->setD1_mfirst());
    $this->usersegment->setMosaicHousehold("A64");
    $this->assertEquals(1, $this->usersegment->setD1_mfirst());
    $this->usersegment->setMosaicHousehold("B12");
    $this->assertEquals(1, $this->usersegment->setD1_mfirst());
    $this->usersegment->setMosaicHousehold("C20");
    $this->assertEquals(1, $this->usersegment->setD1_mfirst());

    $this->usersegment->setMosaicHousehold(0);
    $this->assertEquals(0, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("-");
    $this->assertEquals(0, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("P64");
    $this->assertEquals(1, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("Q12");
    $this->assertEquals(1, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("R20");
    $this->assertEquals(1, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("O12");
    $this->assertEquals(1, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("S20");
    $this->assertEquals(1, $this->usersegment->setD5_mfirst());
    $this->usersegment->setMosaicHousehold("U20");
    $this->assertEquals(0, $this->usersegment->setD5_mfirst());

  }

  public function testsetHomeOwnerConst()
  {
    $this->usersegment->setCombinedHomeOwnerRenter(0);
    $this->assertEquals(0, $this->usersegment->setHomeOwnerConst());
    $this->usersegment->setCombinedHomeOwnerRenter("8");
    $this->assertEquals(1, $this->usersegment->setHomeOwnerConst());
    $this->usersegment->setCombinedHomeOwnerRenter("9");
    $this->assertEquals(1, $this->usersegment->setHomeOwnerConst());
    $this->usersegment->setCombinedHomeOwnerRenter("H");
    $this->assertEquals(1, $this->usersegment->setHomeOwnerConst());
  }
*/
}
