<template>
  <div :class="['form-group has-feedback ', {' has-error' : error, ' has-success': succes }]">
    <label class="control-label small" :for="columnname">{{title}}</label>
    <div class="form-inline">

      <div v-if="error" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> {{message}}
      </div>

      <input v-if="this.newvalue == ''" type="text" class="form-control " ref="input" :name="columnname" :id="columnname" :value="value">
      <input v-else type="text" class="form-control " ref="updatedinput" :name="columnname" :id="columnname" :value="this.newvalue">

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
      newvalue: '',
      value_to_process: '',
    }
  },

  methods: {
    updateclustervalue: function(){
      if(this.newvalue ==''){
        this.value_to_process = this.$refs.input.value;
      }else {
        this.value_to_process = this.$refs.updatedinput.value;
      }
      console.log(this.value_to_process, this.columnname, this.id);

      axios.post('clustervalues/update', {
        id: this.id,
        name: this.columnname,
        value: this.value_to_process,
      }).then(response=>{
        console.log(response.data.status);

        if(response.data.status == "sucess"){
          this.succes = true;
          this.error = false;
          this.newvalue = response.data.value;
        }else{
          this.error = true;
          this.succes = false;
          this.message = response.data.message;
        }
        let self = this;
        setTimeout(function(){
          self.succes = false;
          self.error = false;
          self.message = null;
        }, 5000);

      }
    ).catch(
      error =>console.log(error)
    );
  },
}, //end methods


}
</script>
