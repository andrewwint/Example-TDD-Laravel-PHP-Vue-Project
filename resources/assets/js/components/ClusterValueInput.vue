<template>
    <div :class="['form-group has-feedback ', {' has-error' : error, ' has-success': succes }]">
       <label class="control-label small" :for="columnname">{{title}}</label>
       <div class="form-inline">

         <div v-if="error" class="alert alert-warning alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Warning!</strong> {{message}}
         </div>

         <input type="text" class="form-control " ref="input" :name="columnname" :id="columnname" :value="value">

         <button
           type="button"
           class="btn btn-primary"
           v-on:click="updateclustervalue()">
            Update
         </button>
       </div>
    </div>
</template>

<script>
import axios from 'axios'
import Vue from 'vue'

export default {
  name:"clusterinput",

  props:{
    value: {
      type: String,
      required: true,
    },
    id: {
      type: String,
      default: "1",
      required: true,
    },
    columnname: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
  },

  data(){
    return{
      error: false,
      succes: false,
      message: '',
      newvalue: ''
    }
  },

  methods: {
    updateclustervalue: function(){
      console.log(this.$refs.input.value, this.columnname, this.id);
      axios.post('clustervalues/update', {
          id: this.id,
          name: this.columnname,
          value: this.$refs.input.value,
        }).then(response=>{
          console.log(response.data.status);

            if(response.data.status == "sucess"){
               this.succes = true;
               this.error = false;
               Vue.set({}, this.value, response.data.value);
            }else{
               this.error = true;
               this.succes = false;
               this.message = response.data.message;
            }
          }
        ).catch(
          error =>console.log(error)
        );
    },
  }, //end methods


}
</script>
