<template>
  <div>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Validate Cluster Values</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert">
            <h4>{{score}}<small> {{message}}</small></h4>
          </div>
        </div>

        <div class="row">
          <form class="form-inline " ref="from" v-on:submit.prevent="getscore">
            <fieldset>
              <!-- Text input-->
              <div class="form-group" v-for="item in items">
                <div>
                  <label class="col-md-5 control-label  text-right" :for="item.label">{{item.label}}</label>
                  <div class="col-md-7">
                    <input :ref="item.name" :name="item.name" v-model="item.value" :value="item.name" type="text" :placeholder="item.label"
                    data-toggle="tooltip" data-placement="left" :title="item.help"
                    class="form-control">
                    <span class="help-block small"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-md-offset-3">
                <label for="submit"></label>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Score</button>
              </div>
            </div>

          </fieldset>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name:"SegmentScore",

  data(){
    return{
      error: false,
      succes: false,
      message: '',
      score: '',
      medianfamilyhouseholdincome: '',

      items: {
        'medianfamilyhouseholdincome':  {label:'Median Family House Hold Income', name:'medianfamilyhouseholdincome', help:'Example : 160173, 16173', value:''},
        'medianeductionattained':  {label:'Median Eduction Attained', name:'medianeductionattained', help:'Example : 147', value:''},
        'marriedcouplefamily':  {label:'Married Couple Family', name:'marriedcouplefamily', help:'Example : 714', value:''},
        'childhhwithpersons':  {label:'Child HH With Persons', name:'childhhwithpersons', help:'Example : 478', value:''},
        'medianhomevalue':  {label:'Median Home Value', name:'medianhomevalue', help:'Example : 627004', value:''},
        'pophispanic':  {label:'Pop Hispanic', name:'pophispanic', help:'Example : 1', value:''},
        'popasian':  {label:'Pop Asian', name:'popasian', help:'Example : 22', value:''},
        'numberofpersonsinunit':  {label:'Number of Persons in Unit', name:'numberofpersonsinunit', help:'Example : 5, 2, 1', value:''},
        'urbancountysizecode':  {label:'Urban County Size Code', name:'urbancountysizecode', help:'Example : 2, 3', value:''},
        'lengthofresidence':  {label:'Length of Residence', name:'lengthofresidence', help:'Example : 2, 4, 9', value:''},
        'homepurchasedate':  {label:'Home Purchase Date', name:'homepurchasedate', help:'Example : 19970416', value:''},
        'esthouseholdincome':  {label:'Estimated House Hold Income', name:'esthouseholdincome', help:'Example : A to L', value:''},
        'mosaichousehold':  {label:'Mosaic Household', name:'mosaichousehold', help:'Example : A, B, C for D1 or O, P, Q, R , S for D5 ', value:''},
        'combinedhomeownerrenter':  {label:'Combined Home Owner Renter', name:'combinedhomeownerrenter', help:'Example : 9, H', value:''}
      }
    }
  },

  methods: {
    getscore: function(){

      axios.post('/api/clustervalues/score', {
        d: 1,
        id: 1,
        args_array: {
          MedianFamilyHouseholdIncome: this.items.medianfamilyhouseholdincome.value,
          MedianEductionAttained: this.items.medianeductionattained.value,
          MarriedCoupleFamily: this.items.marriedcouplefamily.value,
          ChildHHWithPersons: this.items.childhhwithpersons.value,
          MedianHomeValue: this.items.medianhomevalue.value,
          PopHispanic: this.items.pophispanic.value,
          PopAsian: this.items.popasian.value,
          NumberOfPersonsInUnit: this.items.numberofpersonsinunit.value,
          UrbanCountySizeCode: this.items.urbancountysizecode.value,
          LengthOfResidence: this.items.lengthofresidence.value,
          HomePurchaseDate: this.items.homepurchasedate.value,
          EstHouseHoldIncome: this.items.esthouseholdincome.value,
          MosaicHousehold: this.items.mosaichousehold.value,
          CombinedHomeOwnerRenter: this.items.combinedhomeownerrenter.value,
          
        }

      }).then(response=>{

        if(response.data.status == "sucess"){
          this.succes = true;
          this.error = false;
          this.score = response.data.value;
          this.message = response.data.message;
        }else{
          this.error = true;
          this.succes = false;
          this.score = response.data.value;
          this.message = response.data.message;
        }

      }
    ).catch(
      error =>console.log(error)
    );
  },
}, //end methods
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>

<style scoped>
  .form-group{
    width: 50%;
  }

</style>
