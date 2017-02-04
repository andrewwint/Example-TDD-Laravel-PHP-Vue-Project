<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\ClusterValue as ClusterValue;

class ClusterValueTest extends TestCase
{

  use DatabaseTransactions;

  protected $clusterValue;

  protected $args_array_1 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => 19970416,
    "EstHouseHoldIncome" => 'H',
    "MosaicHousehold" => '',
    "CombinedHomeOwnerRenter" => 'H',
  );

  protected $args_array_2 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => "-",
    "EstHouseHoldIncome" => 'B',
    "MosaicHousehold" => 'Q',
    "CombinedHomeOwnerRenter" => '9',
  );

  protected $args_array_3 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => "",
    "EstHouseHoldIncome" => '',
    "MosaicHousehold" => 'B',
    "CombinedHomeOwnerRenter" => '8',
  );

  protected $args_array_4 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => "",
    "EstHouseHoldIncome" => 'A',
    "MosaicHousehold" => 'P',
    "CombinedHomeOwnerRenter" => '',
  );


  protected $args_array_5 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => "",
    "EstHouseHoldIncome" => 'A',
    "MosaicHousehold" => 'P',
    "CombinedHomeOwnerRenter" => '',
  );

  protected $args_array_6 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => "",
    "EstHouseHoldIncome" => 'A',
    "MosaicHousehold" => 'P',
    "CombinedHomeOwnerRenter" => '',
  );

  protected $args_array_7 = array(
    "MedianFamilyHouseholdIncome" => 160173,
    "MedianEductionAttained" => 147,
    "MarriedCoupleFamily" => 714,
    "ChildHHWithPersons" => 478,
    "MedianHomeValue" => 627004,
    "PopHispanic" => 1,
    "PopAsian" => 22,
    "NumberOfPersonsInUnit" => 5,
    "UrbanCountySizeCode" => 2,
    "LengthOfResidence" => 8,
    "HomePurchaseDate" => "",
    "EstHouseHoldIncome" => 'A',
    "MosaicHousehold" => 'P',
    "CombinedHomeOwnerRenter" => '',
  );

  protected $args_array_8 = array(
    "MedianFamilyHouseholdIncome" => 0,
    "MedianEductionAttained" => 0,
    "MarriedCoupleFamily" => 0,
    "ChildHHWithPersons" => 0,
    "MedianHomeValue" => 0,
    "PopHispanic" => 0,
    "PopAsian" => 0,
    "NumberOfPersonsInUnit" => 0,
    "UrbanCountySizeCode" => 0,
    "LengthOfResidence" => 0,
    "HomePurchaseDate" => "",
    "EstHouseHoldIncome" => '',
    "MosaicHousehold" => '',
    "CombinedHomeOwnerRenter" => '',
  );

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

  public function testSetMedianFamilyHouseholdIncome()
  {
    $this->assertEquals(21110, $this->clusterValue->setMedianFamilyHouseholdIncome(21110));
    $this->assertEquals(0, $this->clusterValue->setMedianFamilyHouseholdIncome("A"));
  }


  public function testSetMedianEductionAttained()
  {
    $this->assertEquals(118, $this->clusterValue->setMedianEductionAttained(118));
    $this->assertEquals(0, $this->clusterValue->setMedianEductionAttained("BB"));
  }

  public function testSetMarriedCoupleFamily()
  {
    $this->assertEquals(157, $this->clusterValue->setMarriedCoupleFamily(157));
    $this->assertEquals(0, $this->clusterValue->setMarriedCoupleFamily("Z34"));
  }

  public function testSetChildHHWithPersons()
  {
    $this->assertEquals(41, $this->clusterValue->setChildHHWithPersons(41));
    $this->assertEquals(0, $this->clusterValue->setChildHHWithPersons("Z34"));
  }

  public function testSetPopHispanic()
  {
    $this->assertEquals(312, $this->clusterValue->setPopHispanic(312));
    $this->assertEquals(0, $this->clusterValue->setPopHispanic("Z34"));
  }

  public function testSetPopAsian()
  {
    $this->assertEquals(12, $this->clusterValue->setPopAsian(12));
    $this->assertEquals(0, $this->clusterValue->setPopAsian("B"));
  }

  public function testSetNumberOfPersonsInUnit()
  {
    $this->assertEquals(4, $this->clusterValue->setNumberOfPersonsInUnit(4));
    $this->assertEquals(0, $this->clusterValue->setNumberOfPersonsInUnit("BN"));
  }

  public function testSetUrbanCountySizeCode()
  {
    $this->assertEquals(3, $this->clusterValue->setUrbanCountySizeCode(3));
    $this->assertEquals(0, $this->clusterValue->setUrbanCountySizeCode("X"));
  }

  public function testSetHomePurchaseDate()
  {
    $this->assertEquals(19880416, $this->clusterValue->setHomePurchaseDate(19880416));
    $this->assertEquals(0, $this->clusterValue->setHomePurchaseDate("Date"));
  }

  public function testSetEstHouseHoldIncome()
  {
    $this->assertEquals("D", $this->clusterValue->setEstHouseHoldIncome("D"));
    $this->assertEquals(0, $this->clusterValue->setEstHouseHoldIncome(123));
  }

  public function testSetMosaicHousehold()
  {
    $this->assertEquals("S", $this->clusterValue->setMosaicHousehold("S"));
    $this->assertEquals(0, $this->clusterValue->setMosaicHousehold(123));
  }

  public function testSetHomePurchaseDateConst()
  {
    $this->clusterValue->setHomePurchaseDate('-');
    $this->assertEquals(0, $this->clusterValue->setHomePurchaseDateConst());
    $this->clusterValue->setHomePurchaseDate(19880416);
    $this->assertEquals(19880416, $this->clusterValue->setHomePurchaseDateConst());
    $this->clusterValue->setHomePurchaseDate('');
    $this->assertEquals(0, $this->clusterValue->setHomePurchaseDateConst());
  }

  public function testSetEstimatedHouseIncomeConst()
  {
    $this->clusterValue->setEstHouseHoldIncome("A");
    $this->assertEquals(12500, $this->clusterValue->setEstimatedHouseIncomeConst());
    $this->clusterValue->setEstHouseHoldIncome("G");
    $this->assertEquals(112500, $this->clusterValue->setEstimatedHouseIncomeConst());
    $this->clusterValue->setEstHouseHoldIncome();
    $this->assertEquals(67000, $this->clusterValue->setEstimatedHouseIncomeConst());
    $this->clusterValue->setEstHouseHoldIncome(123);
    $this->assertEquals(67000, $this->clusterValue->setEstimatedHouseIncomeConst());
  }

  public function testSetMosaicHouseholdConst()
  {
    $this->clusterValue->setMosaicHousehold("Q64");
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group());
    $this->clusterValue->setMosaicHousehold("-");
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group());
    $this->clusterValue->setMosaicHousehold("A64");
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group());

    $this->clusterValue->setMosaicHousehold("Q64");
    $this->assertEquals(0, $this->clusterValue->setD1_mfirst());
    $this->clusterValue->setMosaicHousehold("-");
    $this->assertEquals(0, $this->clusterValue->setD1_mfirst());
    $this->clusterValue->setMosaicHousehold("A64");
    $this->assertEquals(1, $this->clusterValue->setD1_mfirst());
    $this->clusterValue->setMosaicHousehold("B12");
    $this->assertEquals(1, $this->clusterValue->setD1_mfirst());
    $this->clusterValue->setMosaicHousehold("C20");
    $this->assertEquals(1, $this->clusterValue->setD1_mfirst());

    $this->clusterValue->setMosaicHousehold(0);
    $this->assertEquals(0, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("-");
    $this->assertEquals(0, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("P64");
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("Q12");
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("R20");
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("O12");
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("S20");
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst());
    $this->clusterValue->setMosaicHousehold("U20");
    $this->assertEquals(0, $this->clusterValue->setD5_mfirst());

  }

  public function testSetHomeOwnerConst()
  {
    $this->clusterValue->setCombinedHomeOwnerRenter(0);
    $this->assertEquals(0, $this->clusterValue->setHomeOwnerConst());
    $this->clusterValue->setCombinedHomeOwnerRenter("8");
    $this->assertEquals(1, $this->clusterValue->setHomeOwnerConst());
    $this->clusterValue->setCombinedHomeOwnerRenter("9");
    $this->assertEquals(1, $this->clusterValue->setHomeOwnerConst());
    $this->clusterValue->setCombinedHomeOwnerRenter("H");
    $this->assertEquals(1, $this->clusterValue->setHomeOwnerConst());
  }

  public function testD1ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_married_couple_family, $this->clusterValue->clusters->d1_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_d1_mfirst, $this->clusterValue->clusters->d1_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_median_education_attained, $this->clusterValue->clusters->d1_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_d5_mfirst, $this->clusterValue->clusters->d1_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_median_family_household_income, $this->clusterValue->clusters->d1_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_home_owner, $this->clusterValue->clusters->d1_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_number_of_persons_in_living_unit, $this->clusterValue->clusters->d1_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_child_hh_with_persons, $this->clusterValue->clusters->d1_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_median_home_value, $this->clusterValue->clusters->d1_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_urban_county_size_code, $this->clusterValue->clusters->d1_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_pop_hispanic, $this->clusterValue->clusters->d1_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_pop_asian, $this->clusterValue->clusters->d1_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_combnd_mosaic_group, $this->clusterValue->clusters->d1_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_d_est_inc_v5, $this->clusterValue->clusters->d1_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_length_of_residence, $this->clusterValue->clusters->d1_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d1_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d1_mor_home_pur_home_pur_1);
  }

  public function testD2ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_married_couple_family, $this->clusterValue->clusters->d2_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_d1_mfirst, $this->clusterValue->clusters->d2_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_median_education_attained, $this->clusterValue->clusters->d2_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_d5_mfirst, $this->clusterValue->clusters->d2_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_median_family_household_income, $this->clusterValue->clusters->d2_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_home_owner, $this->clusterValue->clusters->d2_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_number_of_persons_in_living_unit, $this->clusterValue->clusters->d2_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_child_hh_with_persons, $this->clusterValue->clusters->d2_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_median_home_value, $this->clusterValue->clusters->d2_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_urban_county_size_code, $this->clusterValue->clusters->d2_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_pop_hispanic, $this->clusterValue->clusters->d2_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_pop_asian, $this->clusterValue->clusters->d2_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_combnd_mosaic_group, $this->clusterValue->clusters->d2_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_d_est_inc_v5, $this->clusterValue->clusters->d2_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_length_of_residence, $this->clusterValue->clusters->d2_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d2_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d2_mor_home_pur_home_pur_1);
  }

  public function testD3ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_married_couple_family, $this->clusterValue->clusters->d3_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_d1_mfirst, $this->clusterValue->clusters->d3_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_median_education_attained, $this->clusterValue->clusters->d3_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_d5_mfirst, $this->clusterValue->clusters->d3_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_median_family_household_income, $this->clusterValue->clusters->d3_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_home_owner, $this->clusterValue->clusters->d3_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_number_of_persons_in_living_unit, $this->clusterValue->clusters->d3_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_child_hh_with_persons, $this->clusterValue->clusters->d3_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_median_home_value, $this->clusterValue->clusters->d3_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_urban_county_size_code, $this->clusterValue->clusters->d3_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_pop_hispanic, $this->clusterValue->clusters->d3_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_pop_asian, $this->clusterValue->clusters->d3_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_combnd_mosaic_group, $this->clusterValue->clusters->d3_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_d_est_inc_v5, $this->clusterValue->clusters->d3_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_length_of_residence, $this->clusterValue->clusters->d3_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d3_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d3_mor_home_pur_home_pur_1);
  }

  public function testD4ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_married_couple_family, $this->clusterValue->clusters->d4_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_d1_mfirst, $this->clusterValue->clusters->d4_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_median_education_attained, $this->clusterValue->clusters->d4_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_d5_mfirst, $this->clusterValue->clusters->d4_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_median_family_household_income, $this->clusterValue->clusters->d4_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_home_owner, $this->clusterValue->clusters->d4_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_number_of_persons_in_living_unit, $this->clusterValue->clusters->d4_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_child_hh_with_persons, $this->clusterValue->clusters->d4_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_median_home_value, $this->clusterValue->clusters->d4_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_urban_county_size_code, $this->clusterValue->clusters->d4_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_pop_hispanic, $this->clusterValue->clusters->d4_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_pop_asian, $this->clusterValue->clusters->d4_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_combnd_mosaic_group, $this->clusterValue->clusters->d4_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_d_est_inc_v5, $this->clusterValue->clusters->d4_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_length_of_residence, $this->clusterValue->clusters->d4_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d4_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d4_mor_home_pur_home_pur_1);
  }

  public function testD5ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_married_couple_family, $this->clusterValue->clusters->d5_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_d1_mfirst, $this->clusterValue->clusters->d5_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_median_education_attained, $this->clusterValue->clusters->d5_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_d5_mfirst, $this->clusterValue->clusters->d5_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_median_family_household_income, $this->clusterValue->clusters->d5_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_home_owner, $this->clusterValue->clusters->d5_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_number_of_persons_in_living_unit, $this->clusterValue->clusters->d5_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_child_hh_with_persons, $this->clusterValue->clusters->d5_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_median_home_value, $this->clusterValue->clusters->d5_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_urban_county_size_code, $this->clusterValue->clusters->d5_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_pop_hispanic, $this->clusterValue->clusters->d5_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_pop_asian, $this->clusterValue->clusters->d5_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_combnd_mosaic_group, $this->clusterValue->clusters->d5_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_d_est_inc_v5, $this->clusterValue->clusters->d5_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_length_of_residence, $this->clusterValue->clusters->d5_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d5_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d5_mor_home_pur_home_pur_1);
  }

  public function testD6ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_married_couple_family, $this->clusterValue->clusters->d6_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_d1_mfirst, $this->clusterValue->clusters->d6_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_median_education_attained, $this->clusterValue->clusters->d6_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_d5_mfirst, $this->clusterValue->clusters->d6_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_median_family_household_income, $this->clusterValue->clusters->d6_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_home_owner, $this->clusterValue->clusters->d6_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_number_of_persons_in_living_unit, $this->clusterValue->clusters->d6_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_child_hh_with_persons, $this->clusterValue->clusters->d6_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_median_home_value, $this->clusterValue->clusters->d6_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_urban_county_size_code, $this->clusterValue->clusters->d6_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_pop_hispanic, $this->clusterValue->clusters->d6_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_pop_asian, $this->clusterValue->clusters->d6_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_combnd_mosaic_group, $this->clusterValue->clusters->d6_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_d_est_inc_v5, $this->clusterValue->clusters->d6_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_length_of_residence, $this->clusterValue->clusters->d6_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d6_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d6_mor_home_pur_home_pur_1);
  }

  public function testD7ClusterValues()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_married_couple_family, $this->clusterValue->clusters->d7_married_couple_family);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_d1_mfirst, $this->clusterValue->clusters->d7_d1_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_median_education_attained, $this->clusterValue->clusters->d7_median_education_attained);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_d5_mfirst, $this->clusterValue->clusters->d7_d5_mfirst);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_median_family_household_income, $this->clusterValue->clusters->d7_median_family_household_income);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_home_owner, $this->clusterValue->clusters->d7_home_owner);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_number_of_persons_in_living_unit, $this->clusterValue->clusters->d7_number_of_persons_in_living_unit);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_child_hh_with_persons, $this->clusterValue->clusters->d7_child_hh_with_persons);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_median_home_value, $this->clusterValue->clusters->d7_median_home_value);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_urban_county_size_code, $this->clusterValue->clusters->d7_urban_county_size_code);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_pop_hispanic, $this->clusterValue->clusters->d7_pop_hispanic);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_pop_asian, $this->clusterValue->clusters->d7_pop_asian);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_combnd_mosaic_group, $this->clusterValue->clusters->d7_combnd_mosaic_group);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_d_est_inc_v5, $this->clusterValue->clusters->d7_d_est_inc_v5);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_length_of_residence, $this->clusterValue->clusters->d7_length_of_residence);
    $this->assertStringMatchesFormat('%f', $this->clusterValue->clusters->d7_mor_home_pur_home_pur_1, $this->clusterValue->clusters->d7_mor_home_pur_home_pur_1);
  }

  public function testInt_1()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertEquals(19970416, $this->clusterValue->setHomePurchaseDateConst(), 'setHomePurchaseDateConst()');
    $this->assertEquals(137500, $this->clusterValue->setEstimatedHouseIncomeConst(),'setEstimatedHouseIncomeConst()' );
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group(), 'setCombnd_Mosaic_Group()'); //look into
    $this->assertEquals(0, $this->clusterValue->setD1_mfirst(), 'setD5_mfirst()'); //look into
    $this->assertEquals(0, $this->clusterValue->setD5_mfirst(), 'setD5_mfirst()'); //look into
    $this->assertEquals(1, $this->clusterValue->setHomeOwnerConst(), 'setHomeOwnerConst()');
  }

  public function testInt_2()
  {
    $this->clusterValue->init(1, 1, $this->args_array_2);
    $this->assertEquals(0, $this->clusterValue->setHomePurchaseDateConst(), 'setEstimatedHouseIncomeConst()');
    $this->assertEquals(20000, $this->clusterValue->setEstimatedHouseIncomeConst(), 'setEstimatedHouseIncomeConst()');
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group(), 'setCombnd_Mosaic_Group()'); //look into
    $this->assertEquals(0, $this->clusterValue->setD1_mfirst(), 'setD1_mfirst()'); //look into
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst(), 'setD5_mfirst()'); //look into
    $this->assertEquals(1, $this->clusterValue->setHomeOwnerConst(), 'setHomeOwnerConst()');
  }

  public function testInt_3()
  {
    $this->clusterValue->init(1, 1, $this->args_array_3);
    $this->assertEquals(0, $this->clusterValue->setHomePurchaseDateConst(), 'setHomePurchaseDateConst()');
    $this->assertEquals(67000, $this->clusterValue->setEstimatedHouseIncomeConst(), "setEstimatedHouseIncomeConst() Nothing was set");
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group(), 'setCombnd_Mosaic_Group()'); //look into
    $this->assertEquals(1, $this->clusterValue->setD1_mfirst(), 'setD1_mfirst()'); //look into
    $this->assertEquals(0, $this->clusterValue->setD5_mfirst(), 'setD5_mfirst()' ); //look into
    $this->assertEquals(1, $this->clusterValue->setHomeOwnerConst(), 'setHomeOwnerConst()');
  }

  public function testInt_4()
  {
    $this->clusterValue->init(1, 1, $this->args_array_4);
    $this->assertEquals(0, $this->clusterValue->setHomePurchaseDateConst(), 'setHomePurchaseDateConst()');
    $this->assertEquals(12500, $this->clusterValue->setEstimatedHouseIncomeConst(), "setEstimatedHouseIncomeConst(), Nothing was set");
    $this->assertEquals(0, $this->clusterValue->setCombnd_Mosaic_Group(), 'setCombnd_Mosaic_Group()'); //look into
    $this->assertEquals(0, $this->clusterValue->setD1_mfirst(), 'setD1_mfirst()'); //look into
    $this->assertEquals(1, $this->clusterValue->setD5_mfirst(), 'setD5_mfirst()'); //look into
    $this->assertEquals(0, $this->clusterValue->setHomeOwnerConst(), 'setHomeOwnerConst()');
  }

  public function testScoringTestPOST()
  {
    $user = factory(\App\User::class)->create();
    $response = $this->actingAs($user, 'api')->post('/api/clustervalues/score',
    ['d'=>1,
    'id'=>1,
    'args_array' => $this->args_array_1]);
    $response->assertStatus(200);
    $response->assertJson(['status' => 'sucess']);
  }

  public function testAssignClusterAny()
  {
    $this->clusterValue->init(1, 1, $this->args_array_1);
    $this->assertLessThanOrEqual(7, $this->clusterValue->assignCluster(), 'Less than Or equal to 7');
  }


  // public function testAssignCluster_1()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_1);
  //   $this->assertEquals(1, $this->clusterValue->assignCluster(), 'Country Careful');
  // }
  //
  // public function testAssignCluster_2()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_2);
  //   $this->assertEquals(2, $this->clusterValue->assignCluster(), 'Basic Beginning');
  // }
  //
  // public function testAssignCluster_3()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_3);
  //   $this->assertEquals(3, $this->clusterValue->assignCluster(), 'Super Singles');
  // }
  //
  // public function testAssignCluster_4()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_4);
  //   $this->assertEquals(4, $this->clusterValue->assignCluster(), 'Middle-Grounded');
  // }
  //
  // public function testAssignCluster_5()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_5);
  //   $this->assertEquals(5, $this->clusterValue->assignCluster(), 'Living Latin');
  // }
  //
  // public function testAssignCluster_6()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_6);
  //   $this->assertEquals(6, $this->clusterValue->assignCluster(), 'Established Elders');
  // }
  //
  // public function testAssignCluster_7()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_7);
  //   $this->assertEquals(7, $this->clusterValue->assignCluster(), 'Oozing Optimism');
  // }
  //
  // public function testAssignCluster_8()
  // {
  //   $this->clusterValue->init(1, 1, $this->args_array_8);
  //   $this->assertEquals(0, $this->clusterValue->assignCluster(), 'Unassigned');
  // }



}
