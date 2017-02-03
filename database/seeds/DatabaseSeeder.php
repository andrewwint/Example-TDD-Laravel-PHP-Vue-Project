<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cluster_values')->insert([
          'name' => 'default',
          'is_active' => 1,
          /*
              D1 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1-0.0242525305)**2
              +	(D1_MFIRST+0.464193962)**2
              +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1+0.542113073)**2
              +	(D5_MFIRST+0.502715067)**2
              +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1+0.509776433)**2
              +	(HOWN-0.3616965899)**2
              +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1-0.1027220767)**2
              +	(CAPE_CHILD__HH_WITH_PERSONS_1+0.15304079)**2
              +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1+0.538680563)**2
              +	(RURAL_URBAN_CODE_1-0.859314131)**2
              +	(CAPE_ETHNIC_POP_HISPANIC_1+0.36416177)**2
                +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1+0.408596374)**2
              +	(Combnd_Mosaic_Group+0.073974658)**2
              +	(D_EST_INC_V5+0.274475129)**2
              +	(LENGTH_OF_RESIDENCE_1+0.101641929)**2
              +	(MOR_HOME_PUR_HOME_PUR_1-0.3993013719)**2);
            */

          'd1_married_couple_family' => '-0.0242525305',
          'd1_d1_mfirst' => '+0.464193962',
          'd1_median_education_attained' => '+0.542113073',
          'd1_d5_mfirst' => '+0.502715067',
          'd1_median_family_household_income' => '+0.509776433',
          'd1_home_owner' => '-0.3616965899',
          'd1_number_of_persons_in_living_unit' => '-0.1027220767',
          'd1_child_hh_with_persons' => '+0.15304079',
          'd1_median_home_value' => '+0.538680563',
          'd1_urban_county_size_code' => '-0.859314131',
          'd1_pop_hispanic' => '+0.36416177',
          'd1_pop_asian' => '+0.408596374',
          'd1_combnd_mosaic_group' => '+0.073974658',
          'd1_d_est_inc_v5' => '+0.274475129',
          'd1_length_of_residence' => '+0.101641929',
          'd1_mor_home_pur_home_pur_1' => '-0.3993013719',

          /*
              D2 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1+0.62947902)**2
              +	(D1_MFIRST+0.477862127)**2
              +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1+0.378993917)**2
              +	(D5_MFIRST-1.1218745999)**2
              +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1+0.544766019)**2
              +	(HOWN+0.921616223)**2
              +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1+0.652526395)**2
              +	(CAPE_CHILD__HH_WITH_PERSONS_1+0.318315513)**2
              +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1+0.412506412)**2
              +	(RURAL_URBAN_CODE_1+0.045503763)**2
              +	(CAPE_ETHNIC_POP_HISPANIC_1+0.104383087)**2
              +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1+0.188446425)**2
              +	(Combnd_Mosaic_Group-1.0907604)**2
              +	(D_EST_INC_V5+0.487057843)**2
              +	(LENGTH_OF_RESIDENCE_1+0.631564263)**2
              +	(MOR_HOME_PUR_HOME_PUR_1-0.0923262128)**2);
              */

          'd2_married_couple_family' => '+0.62947902',
          'd2_d1_mfirst' => '+0.477862127',
          'd2_median_education_attained' => '+0.378993917',
          'd2_d5_mfirst' => '-1.1218745999',
          'd2_median_family_household_income' => '+0.544766019',
          'd2_home_owner' => '0.921616223',
          'd2_number_of_persons_in_living_unit' => '+0.652526395',
          'd2_child_hh_with_persons' => '+0.318315513',
          'd2_median_home_value' => '+0.412506412',
          'd2_urban_county_size_code' => '+0.045503763',
          'd2_pop_hispanic' => '+0.104383087',
          'd2_pop_asian' => '+0.188446425',
          'd2_combnd_mosaic_group' => '-1.0907604',
          'd2_d_est_inc_v5' => '+0.487057843',
          'd2_length_of_residence' => '+0.631564263',
          'd2_mor_home_pur_home_pur_1' => '-0.0923262128',

          /*
             D3 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1+1.054994508)**2
             +	(D1_MFIRST-0.0030015165)**2
             +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1-1.5569186105)**2
             +	(D5_MFIRST+0.325246357)**2
             +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1-1.0906197956)**2
             +	(HOWN+0.605046189)**2
             +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1+0.538648232)**2
             +	(CAPE_CHILD__HH_WITH_PERSONS_1+1.454463261)**2
             +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1-1.0280839226)**2
             +	(RURAL_URBAN_CODE_1+0.501329146)**2
             +	(CAPE_ETHNIC_POP_HISPANIC_1+0.244420836)**2
             +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1-0.6333771785)**2
             +	(Combnd_Mosaic_Group+0.318694963)**2
             +	(D_EST_INC_V5-0.3975961587)**2
             +	(LENGTH_OF_RESIDENCE_1+0.390921078)**2
             +	(MOR_HOME_PUR_HOME_PUR_1-0.1107195971)**2);
             */

          'd3_married_couple_family' => '+1.054994508',
          'd3_d1_mfirst' => '-0.0030015165',
          'd3_median_education_attained' => '-1.5569186105',
          'd3_d5_mfirst' => '+0.325246357',
          'd3_median_family_household_income' => '-1.0906197956',
          'd3_home_owner' => '+0.605046189',
          'd3_number_of_persons_in_living_unit' => '+0.538648232',
          'd3_child_hh_with_persons' => '+1.454463261',
          'd3_median_home_value' => '-1.0280839226',
          'd3_urban_county_size_code' => '+0.501329146',
          'd3_pop_hispanic' => '+0.244420836',
          'd3_pop_asian' => '-0.6333771785',
          'd3_combnd_mosaic_group' => '+0.318694963',
          'd3_d_est_inc_v5' => '-0.3975961587',
          'd3_length_of_residence' => '+0.390921078',
          'd3_mor_home_pur_home_pur_1' => '-0.1107195971',

          /*
             D4 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1+0.001611566)**2
             +	(D1_MFIRST+0.137310729)**2
             +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1+0.290504641)**2
             +	(D5_MFIRST+0.387589665)**2
             +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1+0.100946516)**2
             +	(HOWN-0.7897584769)**2
             +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1-0.8137833116)**2
             +	(CAPE_CHILD__HH_WITH_PERSONS_1+0.108877281)**2
             +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1+0.077094951)**2
             +	(RURAL_URBAN_CODE_1+0.240642148)**2
             +	(CAPE_ETHNIC_POP_HISPANIC_1+0.148551696)**2
             +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1+0.180224911)**2
             +	(Combnd_Mosaic_Group+0.201819544)**2
             +	(D_EST_INC_V5+0.105865435)**2
             +	(LENGTH_OF_RESIDENCE_1-1.7809370134)**2
             +	(MOR_HOME_PUR_HOME_PUR_1+1.463758366)**2);
             */


          'd4_married_couple_family' => '+0.001611566',
          'd4_d1_mfirst' => '+0.137310729',
          'd4_median_education_attained' => '+0.290504641',
          'd4_d5_mfirst' => '+0.387589665',
          'd4_median_family_household_income' => '+0.100946516',
          'd4_home_owner' => '-0.7897584769',
          'd4_number_of_persons_in_living_unit' => '-0.8137833116',
          'd4_child_hh_with_persons' => '+0.108877281',
          'd4_median_home_value' => '+0.077094951',
          'd4_urban_county_size_code' => '+0.240642148',
          'd4_pop_hispanic' => '+0.148551696',
          'd4_pop_asian' => '+0.180224911',
          'd4_combnd_mosaic_group' => '+0.201819544',
          'd4_d_est_inc_v5' => '+0.105865435',
          'd4_length_of_residence' => '-1.7809370134',
          'd4_mor_home_pur_home_pur_1' => '1.463758366',

          /*
          D5 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1+0.325434903)**2
          +	(D1_MFIRST+0.477862127)**2
          +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1+0.940483657)**2
          +	(D5_MFIRST-0.914700976)**2
          +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1+0.888851702)**2
          +	(HOWN+0.533715685)**2
          +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1+0.155581269)**2
          +	(CAPE_CHILD__HH_WITH_PERSONS_1-1.0583950425)**2
          +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1+0.216526232)**2
          +	(RURAL_URBAN_CODE_1+0.338855507)**2
          +	(CAPE_ETHNIC_POP_HISPANIC_1-2.7678784948)**2
          +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1+0.089349705)**2
          +	(Combnd_Mosaic_Group-0.8747380767)**2
          +	(D_EST_INC_V5+0.472156511)**2
          +	(LENGTH_OF_RESIDENCE_1+0.210392305)**2
          +	(MOR_HOME_PUR_HOME_PUR_1-0.0374663533)**2);
          */


          'd5_married_couple_family' => '+0.325434903',
          'd5_d1_mfirst' => '+0.477862127',
          'd5_median_education_attained' => '+0.940483657',
          'd5_d5_mfirst' => '-0.914700976',
          'd5_median_family_household_income' => '+0.888851702',
          'd5_home_owner' => '+0.533715685',
          'd5_number_of_persons_in_living_unit' => '+0.155581269',
          'd5_child_hh_with_persons' => '-1.0583950425',
          'd5_median_home_value' => '+0.216526232',
          'd5_urban_county_size_code' => '+0.338855507',
          'd5_pop_hispanic' => '-2.7678784948',
          'd5_pop_asian' => '+0.089349705',
          'd5_combnd_mosaic_group' => '-0.8747380767',
          'd5_d_est_inc_v5' => '+0.472156511',
          'd5_length_of_residence' => '+0.210392305',
          'd5_mor_home_pur_home_pur_1' => '-0.0374663533',

          /*
          D6 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1-1.1275808573)**2
          +	(D1_MFIRST-1.9520999734)**2
          +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1-1.493302837)**2
          +	(D5_MFIRST+0.524265379)**2
          +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1-1.6926574993)**2
          +	(HOWN-0.6308255791)**2
          +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1-0.6456303494)**2
          +	(CAPE_CHILD__HH_WITH_PERSONS_1-0.7107592217)**2
          +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1-1.7440244227)**2
          +	(RURAL_URBAN_CODE_1+0.507787661)**2
          +	(CAPE_ETHNIC_POP_HISPANIC_1+0.277977509)**2
          +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1-1.496166702)**2
          +	(Combnd_Mosaic_Group+1.111951245)**2
          +	(D_EST_INC_V5-1.3914317393)**2
          +	(LENGTH_OF_RESIDENCE_1-0.7309419153)**2
          +	(MOR_HOME_PUR_HOME_PUR_1+0.568247016)**2);
          */

          'd6_married_couple_family' => '-1.1275808573',
          'd6_d1_mfirst' => '-1.9520999734',
          'd6_median_education_attained' => '-1.493302837',
          'd6_d5_mfirst' => '+0.524265379',
          'd6_median_family_household_income' => '-1.6926574993',
          'd6_home_owner' => '-0.6308255791',
          'd6_number_of_persons_in_living_unit' => '-0.6456303494',
          'd6_child_hh_with_persons' => '-0.7107592217',
          'd6_median_home_value' => '-1.7440244227',
          'd6_urban_county_size_code' => '+0.507787661',
          'd6_pop_hispanic' => '+0.277977509',
          'd6_pop_asian' => '-1.496166702',
          'd6_combnd_mosaic_group' => '+1.111951245',
          'd6_d_est_inc_v5' => '-1.3914317393',
          'd6_length_of_residence' => '-0.7309419153',
          'd6_mor_home_pur_home_pur_1' => '+0.568247016',

          /*
          D7 =  SQRT((CAPE_TYP_HH_MARRIED_COUPLE_1-0.8044500019)**2
          +	(D1_MFIRST-0.6267235472)**2
          +	(CAPE_EDUC_POP25_MEDIAN_EDUCA_1-0.46382014)**2
          +	(D5_MFIRST+0.524265379)**2
          +	(CAPE_INC_HH_MEDIAN_FAMILY_HOU_1-0.5950083854)**2
          +	(HOWN-0.3990088858)**2
          +	(NUM_OF_PERSONS_IN_LIVING_UNIT_1-0.2070779083)**2
          +	(CAPE_CHILD__HH_WITH_PERSONS_1-0.4949554157)**2
          +	(CAPE_HOMVAL_OHU_MEDIAN_HOME_1-0.195308045)**2
          +	(RURAL_URBAN_CODE_1+0.366709672)**2
          +	(CAPE_ETHNIC_POP_HISPANIC_1+0.20368312)**2
          +	(CAPE_ETHNIC_POP_ASIAN_ONLY_1-0.020003753)**2
          +	(Combnd_Mosaic_Group+0.880211855)**2
          +	(D_EST_INC_V5-0.4566323381)**2
          +	(LENGTH_OF_RESIDENCE_1+0.173646329)**2
          +	(MOR_HOME_PUR_HOME_PUR_1-0.3814734956)**2);
          */


          'd7_married_couple_family' => '-0.8044500019',
          'd7_d1_mfirst' => '-0.6267235472',
          'd7_median_education_attained' => '-0.46382014',
          'd7_d5_mfirst' => '+0.524265379',
          'd7_median_family_household_income' => '-0.5950083854',
          'd7_home_owner' => '-0.3990088858',
          'd7_number_of_persons_in_living_unit' => '-0.2070779083',
          'd7_child_hh_with_persons' => '-0.4949554157',
          'd7_median_home_value' => '-0.195308045',
          'd7_urban_county_size_code' => '+0.366709672',
          'd7_pop_hispanic' => '+0.20368312',
          'd7_pop_asian' => '-0.020003753',
          'd7_combnd_mosaic_group' => '+0.880211855',
          'd7_d_est_inc_v5' => '-0.4566323381',
          'd7_length_of_residence' => '+0.173646329',
          'd7_mor_home_pur_home_pur_1' => '-0.3814734956',

          'created_at' => date("Y-m-d H:i:s")

      ]);//


      DB::table('users')->insert([
          'name' => 'Andrew Wint',
          'email' => 'wint.andrew@gmail.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Patrick Toner',
          'email' => 'ptoner@customerbenefitsanalytics.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Ben Bartholomew',
          'email' => 'ben@robot-kittens.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Ranga Srinivasan',
          'email' => 'ranga.s@ekoinfomatics.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Tom Duval',
          'email' => 'tduval9497@gmail.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);


    }
}
