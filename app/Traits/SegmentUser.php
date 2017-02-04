<?php namespace App\Traits;

use App\ClusterValue as ClusterValue;
use Illuminate\Support\Facades\DB;
/**
*
*/
trait SegmentUser
{

  private $user_id;

  private $pervious_segment;

  private $median_family_household_income; //CAPE: INC: HH: MEDIAN FAMILY HOUSEHOLD INCOME

  private $median_education_attained; //CAPE: EDUC: POP25+: MEDIAN EDUCATION ATTAINED

  private $married_couple_family; //CAPE: TYP: HH: % MARRIED COUPLE FAMILY

  private $child_hh_with_persons; //CAPE: CHILD: HH: % WITH PERSONS LT18 [22]

  private $median_home_value; //CAPE: HOMVAL: OOHU: MEDIAN HOME VALUE [31]

  private $pop_hispanic; //CAPE: ETHNIC: POP: % HISPANIC [29]

  private $pop_asian; //CAPE: ETHNIC: POP: % ASIAN [27]

  private $number_of_persons_in_living_unit; //NUMBER OF PERSONS IN LIVING UNIT

  private $urban_county_size_code; //RURAL URBAN COUNTY SIZE CODE

  private $length_of_residence; //LENGTH OF RESIDENCE

  private $home_purchase_date; //MORTGAGE-HOME PURCHASE: HOME PURCHASE DATE

  private $set_household_income;  //EST HOUSEHOLD INCOME V5

  private $mosaic_household; //MOSAIC HOUSEHOLD TYPE [5]

  private $combined_homeowner_renter;  //HOMEOWNER: COMBINED HOMEOWNER-RENTER

  private $Combnd_Mosaic_Group;

  private $d_est_inc_v5; //$this->d_est_inc_v5

  private $segment_array;

  private $mor_home_pur_home_pur_1; //MOR_HOME_PUR_HOME_PUR_1

  private $home_owner; //HOWN

  private $d1_mfirst; //D1_MFIRST

  private $d5_mfirst; //D5_MFIRST

  public $clusters;

  /**
  *  @param int: $cluster_values_id id in database table `cluster_values`.`id`
  *  @param int: $employee_id id in database table `employee_id`.`id`
  *  @param array:
  *  @example ["MedianFamilyHouseholdIncome" => 160173,
  *           "MedianEductionAttained" => 147,
  *            "MarriedCoupleFamily" => 714,
  *           "ChildHHWithPersons" => 478,
  *           "MedianHomeValue" => 627004,
  *           "PopHispanic" => 1,
  *           "PopAsian" => 22,
  *           "NumberOfPersonsInUnit" => 5,
  *           "UrbanCountySizeCode" => 2,
  *           "LengthOfResidence" => 8,
  *           "HomePurchaseDate" => "",
  *           "EstHouseHoldIncome" => 'A',
  *           "MosaicHousehold" => 'P',
  *           "CombinedHomeOwnerRenter" => '',]
  *  @return true
  *
  */
  function init($cluster_values_id = 1, $employee_id = 1, $args_array = array())
  {

    $clusterValue = new ClusterValue();
    $this->clusters = $clusterValue->find($cluster_values_id);

    if(count($args_array) != 0){
      $this->setMedianFamilyHouseholdIncome($args_array["MedianFamilyHouseholdIncome"]);
      $this->setMedianEductionAttained($args_array["MedianEductionAttained"]);
      $this->setMarriedCoupleFamily($args_array["MarriedCoupleFamily"]);
      $this->setChildHHWithPersons($args_array["MedianFamilyHouseholdIncome"]);
      $this->setMedianHomeValue($args_array["ChildHHWithPersons"]);
      $this->setPopHispanic($args_array["PopHispanic"]);
      $this->setPopAsian($args_array["PopAsian"]);
      $this->setNumberOfPersonsInUnit($args_array["NumberOfPersonsInUnit"]);
      $this->setUrbanCountySizeCode($args_array["UrbanCountySizeCode"]);
      $this->setLengthOfResidence($args_array["LengthOfResidence"]);
      $this->setHomePurchaseDate($args_array["HomePurchaseDate"]);
      $this->setEstHouseHoldIncome($args_array["EstHouseHoldIncome"]);
      $this->setMosaicHousehold($args_array["MosaicHousehold"]);
      $this->setCombinedHomeOwnerRenter($args_array["CombinedHomeOwnerRenter"]);
    }

    $this->setHomePurchaseDateConst();
    $this->setEstimatedHouseIncomeConst();
    $this->setCombnd_Mosaic_Group();
    $this->setD1_mfirst();
    $this->setD5_mfirst();
    $this->setHomeOwnerConst();

    return true;
  }

  /**
  *  This method calculates the cluster assigment
  *
  *  Requres that $this->init is excuted to popluate all the variables needed
  *  for the calculation
  *  @return init
  *  @example 1 to 7
  */
  public function assignCluster()
  {
    //assign cluster
    ini_set('precision', 1000);
    //todo refactor to dry
    $d1 =  sqrt(($this->married_couple_family+(float)$this->clusters->d1_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d1_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d1_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d1_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d1_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d1_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d1_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d1_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d1_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d1_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d1_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d1_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d1_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d1_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d1_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d1_mor_home_pur_home_pur_1)**2);

    $d2 =  sqrt(($this->married_couple_family+(float)$this->clusters->d2_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d2_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d2_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d2_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d2_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d2_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d2_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d2_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d2_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d2_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d2_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d2_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d2_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d2_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d2_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d2_mor_home_pur_home_pur_1)**2);

    $d3 =  sqrt(($this->married_couple_family+(float)$this->clusters->d3_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d3_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d3_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d3_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d3_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d3_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d3_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d3_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d3_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d3_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d3_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d3_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d3_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d3_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d3_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d3_mor_home_pur_home_pur_1)**2);

    $d4 =  sqrt(($this->married_couple_family+(float)$this->clusters->d4_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d4_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d4_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d4_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d4_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d4_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d4_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d4_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d4_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d4_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d4_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d4_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d4_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d4_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d4_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d4_mor_home_pur_home_pur_1)**2);

    $d5 =  sqrt(($this->married_couple_family+(float)$this->clusters->d5_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d5_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d5_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d5_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d5_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d5_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d5_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d5_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d5_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d5_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d5_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d5_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d5_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d5_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d5_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d5_mor_home_pur_home_pur_1)**2);

    $d6 =  sqrt(($this->married_couple_family+(float)$this->clusters->d6_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d6_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d6_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d6_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d6_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d6_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d6_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d6_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d6_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d6_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d6_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d6_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d6_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d6_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d6_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d6_mor_home_pur_home_pur_1)**2);

    $d7 =  sqrt(($this->married_couple_family+(float)$this->clusters->d7_married_couple_family)**2
    +  ($this->d1_mfirst+(float)$this->clusters->d7_d1_mfirst)**2
    +  ($this->median_education_attained+(float)$this->clusters->d7_median_education_attained)**2
    +  ($this->d5_mfirst+(float)$this->clusters->d7_d5_mfirst)**2
    +  ($this->median_family_household_income+(float)$this->clusters->d7_median_family_household_income)**2
    +  ($this->home_owner+(float)$this->clusters->d7_home_owner)**2
    +  ($this->number_of_persons_in_living_unit+(float)$this->clusters->d7_number_of_persons_in_living_unit)**2
    +  ($this->child_hh_with_persons+(float)$this->clusters->d7_child_hh_with_persons)**2
    +  ($this->median_home_value+(float)$this->clusters->d7_median_home_value)**2
    +  ($this->urban_county_size_code+(float)$this->clusters->d7_urban_county_size_code)**2
    +  ($this->pop_hispanic+(float)$this->clusters->d7_pop_hispanic)**2
    +  ($this->pop_asian+(float)$this->clusters->d7_pop_asian)**2
    +  ($this->combnd_mosaic_group+(float)$this->clusters->d7_combnd_mosaic_group)**2
    +  ($this->d_est_inc_v5+(float)$this->clusters->d7_d_est_inc_v5)**2
    +  ($this->length_of_residence+(float)$this->clusters->d7_length_of_residence)**2
    +  ($this->mor_home_pur_home_pur_1+(float)$this->clusters->d7_mor_home_pur_home_pur_1)**2);

    $this->segment_array = array("1" => $d1, "2" => $d2, "3" => $d3, "4" => $d4, "5" => $d5, "6" => $d6, "7" => $d7);

    $min_d = min($this->segment_array);

    $key = array_search($min_d, $this->segment_array);

    ini_set('precision', 14);
    return $key;

  }

  /**
  *
  *  @return sting
  */
  public function debug(){
    echo "\n\n=============== START ===================== \n";
    print_r("USER ID = " . $this->user_id ."\n");
    print_r("getUserSegmentNumber()  " . $this->getUserSegmentNumber() ."\n");
    print_r("pervious_segment  " . $this->pervious_segment ."\n");

    echo "==================================== \n";
    print_r("CAPE: INC: HH: MEDIAN FAMILY HOUSEHOLD INCOME = " . $this->median_family_household_income ."\n");
    print_r("EST HOUSEHOLD INCOME V5 (String) = " . $this->set_household_income ."\n");
    print_r("EST HOUSEHOLD INCOME V5 (Interger) = " . $this->d_est_inc_v5 ."\n");
    echo "==================================== \n";
    print_r("CAPE: EDUC: POP25+: MEDIAN EDUCATION ATTAINED =  " . $this->median_education_attained ."\n");
    print_r("CAPE: TYP: HH: % MARRIED COUPLE FAMILY = " . $this->married_couple_family ."\n");
    print_r("CAPE: CHILD: HH: % WITH PERSONS LT18 =  " . $this->child_hh_with_persons ."\n");
    print_r("CAPE: HOMVAL: OOHU: MEDIAN HOME VALUE=  " . $this->median_home_value ."\n");
    print_r("CAPE: ETHNIC: POP: % HISPANIC =  " . $this->pop_hispanic ."\n");
    print_r("CAPE: ETHNIC: POP: % ASIAN ONLY =  " . $this->pop_asian ."\n");
    echo "==================================== \n";
    print_r("HOMEOWNER: COMBINED HOMEOWNER-RENTER =  " . $this->combined_homeowner_renter ."\n");
    print_r("HOWN or HOME OWNER = " . $this->home_owner ."\n");
    print_r("NUMBER OF PERSONS IN LIVING UNIT = " . $this->number_of_persons_in_living_unit ."\n");
    print_r("RURAL URBAN COUNTY SIZE CODE = " . $this->urban_county_size_code ."\n");
    print_r("LENGTH OF RESIDENCE = " . $this->length_of_residence ."\n");
    echo "==================================== \n";
    print_r("MORTGAGE-HOME PURCHASE: HOME PURCHASE DATE = " . $this->home_purchase_date ."\n");
    print_r("MORTGAGE-HOME PURCHASE: HOME PURCHASE DATE CHECK FOR - = " . $this->mor_home_pur_home_pur_1 ."\n");
    print_r("MOSAIC HOUSEHOLD TYPE = ".  $this->mosaic_household ."\n");
    print_r("Combnd_Mosaic_Group = " . $this->Combnd_Mosaic_Group ."\n");
    print_r("D1_MFIRST = " . $this->d1_mfirst ."\n");
    print_r("D5_MFIRST = " . $this->d5_mfirst ."\n");
    echo "=============== END ===================== \n";
    print_r($this->segment_array);
  }

  /**
  *  @param int:  example 1 to 7
  *  @return array: of columns names in the `cluster_values` table
  */
  public function getTableColumNamesBySegmentNum($d = 1)
  {

    $results = DB::select("SELECT column_name
      FROM information_schema.columns
      WHERE table_name = 'cluster_values'
      AND column_name
      LIKE 'd". $d ."_%'");
      $columns = array();

      foreach ($results as $column) {
        $columns[] = $column->column_name;
      }

      return $columns;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setMedianFamilyHouseholdIncome($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->median_family_household_income = $value;
      }else{
        $this->median_family_household_income = 0;
        error_log('Median Family Household Income must be an Interger or blank ', 0);
      }

      return $this->median_family_household_income;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setMedianEductionAttained($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->median_education_attained = $value;
      }else{
        $this->median_education_attained = 0;
        error_log('Median Eduction Attained  must be an Interger or blank : ' . $value, 0);
      }

      return $this->median_education_attained;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setMarriedCoupleFamily($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->married_couple_family = $value;
      }else{
        $this->married_couple_family = 0;
        error_log('Married Couple Family  must be an Interger or blank '. $value, 0);
      }

      return $this->married_couple_family;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setChildHHWithPersons($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->child_hh_with_persons = $value;
      }else{
        $this->child_hh_with_persons = 0;
        error_log('Child hh With Persons must be an Interger or blank ', 0);
      }

      return $this->child_hh_with_persons;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setMedianHomeValue($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->median_home_value = $value;
      }else{
        $this->median_home_value = 0;
        error_log('Median Home Value must be an Interger or blank', 0);
      }

      return  $this->median_home_value;
    }


    /**
    *  @param int:
    *  @return int:
    */
    public function setPopHispanic($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->pop_hispanic = $value;
      }else{
        $this->pop_hispanic = 0;
        error_log('Population % Hispanic must be an Interger or blank', 0);
      }

      return $this->pop_hispanic;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setPopAsian($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->pop_asian = $value;
      }else{
        $this->pop_asian = 0;
        error_log('Population % Asian must be an Interger or blank', 0);
      }

      return $this->pop_asian;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setNumberOfPersonsInUnit($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->number_of_persons_in_living_unit = $value;
      }else{
        $this->number_of_persons_in_living_unit = 0;
        error_log('Number Of Persons In Living Unit must be an Interger or blank', 0);
      }

      return $this->number_of_persons_in_living_unit;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setUrbanCountySizeCode($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->urban_county_size_code = $value;
      }else{
        $this->urban_county_size_code = 0;
        error_log('Urban County Size Code must be an Interger or blank', 0);
      }

      return $this->urban_county_size_code ;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setLengthOfResidence($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-"){
        $this->length_of_residence = $value;
      }else{
        $this->length_of_residence = 0;
        error_log('Length Of Residence must be an Interger or blank', 0);
      }

      return $this->length_of_residence;
    }

    /**
    *  @param int:
    *  @return int:
    */
    public function setHomePurchaseDate($value = 0)
    {
      if(is_int($value) || $value == "" || $value == "-")
      {
        $this->home_purchase_date = $value;
      }else{
        $this->home_purchase_date = 0;
        error_log($value . ' - Home Purchase date must be an Interger or blank ');
      }

      return $this->home_purchase_date;
    }

    /**
    *  @param int:
    *  @return string:
    */
    public function setEstHouseHoldIncome($value = 0)
    {
      if(is_string($value) || $value == "" || $value == "-")
      {
        $this->set_household_income = $value;
      }else{
        $this->set_household_income = 0;
        error_log('Estimated House Hold Income must be an String or blank', 0);
      }

      return $this->set_household_income;
    }

    /**
    *  @param int:
    *  @return string:
    */
    public function setMosaicHousehold($value = "")
    {
      if(is_string($value) || $value == "" || $value == "-")
      {
        $this->mosaic_household = $value;
      }else{
        $this->mosaic_household = 0;
        error_log($value . ' Mosaic House Hold must be an String or blank', 0);
      }

      return $this->mosaic_household;
    }

    /**
    *  @param string:
    *  @return string:
    */
    public function setCombinedHomeOwnerRenter($value = "")
    {
      if(is_string($value) || $value == "" || $value == "-" || is_int($value) )
      {
        $this->combined_homeowner_renter = $value;
      }else{
        $this->combined_homeowner_renter = 0;
        error_log($value . ' Combined Home Owner Renter must be an String, Interger or blank', 0);
      }

      return $this->combined_homeowner_renter;
    }

    /**
    *  @param null:
    *  @return int:
    */
    public function setHomePurchaseDateConst()
    {
      if ($this->home_purchase_date == "-" || $this->home_purchase_date == '')
      {
        $this->mor_home_pur_home_pur_1 = 0;
      }else{
        $this->mor_home_pur_home_pur_1 = ($this->home_purchase_date*1);
      }

      return $this->mor_home_pur_home_pur_1;
    }

    /**
    *  @uses $this->set_household_income to calulate estimaded Household Income
    *  @return int:
    */
    public function setEstimatedHouseIncomeConst()
    {
      if(is_string($this->set_household_income))
      {
        switch ($this->set_household_income)
        {
          case "A":
          $this->d_est_inc_v5 = 12500;
          break;
          case "B":
          $this->d_est_inc_v5 =  20000;
          break;
          case "C":
          $this->d_est_inc_v5 = 30000;
          break;
          case "D":
          $this->d_est_inc_v5 =  42500;
          break;
          case "E":
          $this->d_est_inc_v5 =  62500;
          break;
          case "F":
          $this->d_est_inc_v5 =  87500;
          break;
          case "G":
          $this->d_est_inc_v5 =  112500;
          break;
          case "H":
          $this->d_est_inc_v5 =  137500;
          break;
          case "I":
          $this->d_est_inc_v5 =  162500;
          break;
          case "J":
          $this->d_est_inc_v5 =  187500;
          break;
          case "K":
          $this->d_est_inc_v5 =  225000;
          break;
          case "L":
          $this->d_est_inc_v5 =  300000;
          break;
          default:
          $this->d_est_inc_v5 =  67000;
        }
      }else{
        $this->d_est_inc_v5 =  67000;
      }

      return $this->d_est_inc_v5;
    }


    /**
    *  @internal
    *
    *  @uses $this->mosaic_household
    *  @return int:
    */
    public function setCombnd_Mosaic_Group()
    {
      $this->Combnd_Mosaic_Group = (int)substr(trim($this->mosaic_household),0,2)*1;

      return $this->Combnd_Mosaic_Group;
    }

    /**
    *  @internal
    *
    *  @uses $this->mosaic_household
    *  @return int:
    */
    public function setD1_mfirst()
    {
      $this->d1_mfirst  = (int)(in_array(substr(trim($this->mosaic_household),0,1), array("A","B","C")));

      return $this->d1_mfirst;
    }

    /**
    *  @internal
    *
    *  @uses sting|int: $this->mosaic_household
    *  @return int:
    */
    public function setD5_mfirst()
    {
      $this->d5_mfirst  = (int)(in_array(substr(trim($this->mosaic_household),0,1), array("O","P","Q","R","S")));

      return $this->d5_mfirst;
    }

    /**
    *  @internal
    *
    *  @uses string|int: $this->combined_homeowner_renter
    *  @return int:
    */
    public function setHomeOwnerConst()
    {
      if(in_array($this->combined_homeowner_renter, array("9","8","H")) && !empty($this->combined_homeowner_renter) ){
        $this->home_owner =  1;
      }else{
        $this->home_owner = 0;
      }

      return $this->home_owner;
    }

  }
