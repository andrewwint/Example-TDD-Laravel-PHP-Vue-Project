<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClusterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->boolean('is_active');
            $table->string('d1_married_couple_family', 128);
            $table->string('d1_d1_mfirst', 128);
            $table->string('d1_median_education_attained', 128);
            $table->string('d1_d5_mfirst', 128);
            $table->string('d1_median_family_household_income', 128);
            $table->string('d1_home_owner', 128);
            $table->string('d1_number_of_persons_in_living_unit', 128);
            $table->string('d1_child_hh_with_persons', 128);
            $table->string('d1_median_home_value', 128);
            $table->string('d1_urban_county_size_code', 128);
            $table->string('d1_pop_hispanic', 128);
            $table->string('d1_pop_asian', 128);
            $table->string('d1_combnd_mosaic_group', 128);
            $table->string('d1_d_est_inc_v5', 128);
            $table->string('d1_length_of_residence', 128);
            $table->string('d1_mor_home_pur_home_pur_1', 128);

            $table->string('d2_married_couple_family', 128);
            $table->string('d2_d1_mfirst', 128);
            $table->string('d2_median_education_attained', 128);
            $table->string('d2_d5_mfirst', 128);
            $table->string('d2_median_family_household_income', 128);
            $table->string('d2_home_owner', 128);
            $table->string('d2_number_of_persons_in_living_unit', 128);
            $table->string('d2_child_hh_with_persons', 128);
            $table->string('d2_median_home_value', 128);
            $table->string('d2_urban_county_size_code', 128);
            $table->string('d2_pop_hispanic', 128);
            $table->string('d2_pop_asian', 128);
            $table->string('d2_combnd_mosaic_group', 128);
            $table->string('d2_d_est_inc_v5', 128);
            $table->string('d2_length_of_residence', 128);
            $table->string('d2_mor_home_pur_home_pur_1', 128);

            $table->string('d3_married_couple_family', 128);
            $table->string('d3_d1_mfirst', 128);
            $table->string('d3_median_education_attained', 128);
            $table->string('d3_d5_mfirst', 128);
            $table->string('d3_median_family_household_income', 128);
            $table->string('d3_home_owner', 128);
            $table->string('d3_number_of_persons_in_living_unit', 128);
            $table->string('d3_child_hh_with_persons', 128);
            $table->string('d3_median_home_value', 128);
            $table->string('d3_urban_county_size_code', 128);
            $table->string('d3_pop_hispanic', 128);
            $table->string('d3_pop_asian', 128);
            $table->string('d3_combnd_mosaic_group', 128);
            $table->string('d3_d_est_inc_v5', 128);
            $table->string('d3_length_of_residence', 128);
            $table->string('d3_mor_home_pur_home_pur_1', 128);

            $table->string('d4_married_couple_family', 128);
            $table->string('d4_d1_mfirst', 128);
            $table->string('d4_median_education_attained', 128);
            $table->string('d4_d5_mfirst', 128);
            $table->string('d4_median_family_household_income', 128);
            $table->string('d4_home_owner', 128);
            $table->string('d4_number_of_persons_in_living_unit', 128);
            $table->string('d4_child_hh_with_persons', 128);
            $table->string('d4_median_home_value', 128);
            $table->string('d4_urban_county_size_code', 128);
            $table->string('d4_pop_hispanic', 128);
            $table->string('d4_pop_asian', 128);
            $table->string('d4_combnd_mosaic_group', 128);
            $table->string('d4_d_est_inc_v5', 128);
            $table->string('d4_length_of_residence', 128);
            $table->string('d4_mor_home_pur_home_pur_1', 128);

            $table->string('d5_married_couple_family', 128);
            $table->string('d5_d1_mfirst', 128);
            $table->string('d5_median_education_attained', 128);
            $table->string('d5_d5_mfirst', 128);
            $table->string('d5_median_family_household_income', 128);
            $table->string('d5_home_owner', 128);
            $table->string('d5_number_of_persons_in_living_unit', 128);
            $table->string('d5_child_hh_with_persons', 128);
            $table->string('d5_median_home_value', 128);
            $table->string('d5_urban_county_size_code', 128);
            $table->string('d5_pop_hispanic', 128);
            $table->string('d5_pop_asian', 128);
            $table->string('d5_combnd_mosaic_group', 128);
            $table->string('d5_d_est_inc_v5', 128);
            $table->string('d5_length_of_residence', 128);
            $table->string('d5_mor_home_pur_home_pur_1', 128);

            $table->string('d6_married_couple_family', 128);
            $table->string('d6_d1_mfirst', 128);
            $table->string('d6_median_education_attained', 128);
            $table->string('d6_d5_mfirst', 128);
            $table->string('d6_median_family_household_income', 128);
            $table->string('d6_home_owner', 128);
            $table->string('d6_number_of_persons_in_living_unit', 128);
            $table->string('d6_child_hh_with_persons', 128);
            $table->string('d6_median_home_value', 128);
            $table->string('d6_urban_county_size_code', 128);
            $table->string('d6_pop_hispanic', 128);
            $table->string('d6_pop_asian', 128);
            $table->string('d6_combnd_mosaic_group', 128);
            $table->string('d6_d_est_inc_v5', 128);
            $table->string('d6_length_of_residence', 128);
            $table->string('d6_mor_home_pur_home_pur_1', 128);

            $table->string('d7_married_couple_family', 128);
            $table->string('d7_d1_mfirst', 128);
            $table->string('d7_median_education_attained', 128);
            $table->string('d7_d5_mfirst', 128);
            $table->string('d7_median_family_household_income', 128);
            $table->string('d7_home_owner', 128);
            $table->string('d7_number_of_persons_in_living_unit', 128);
            $table->string('d7_child_hh_with_persons', 128);
            $table->string('d7_median_home_value', 128);
            $table->string('d7_urban_county_size_code', 128);
            $table->string('d7_pop_hispanic', 128);
            $table->string('d7_pop_asian', 128);
            $table->string('d7_combnd_mosaic_group', 128);
            $table->string('d7_d_est_inc_v5', 128);
            $table->string('d7_length_of_residence', 128);
            $table->string('d7_mor_home_pur_home_pur_1', 128);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cluster_values');
    }
}
