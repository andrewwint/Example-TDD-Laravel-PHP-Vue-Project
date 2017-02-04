<template>
   <div class="row">
     <div class=" col-md-6 col-lg-4" v-for="item in items">
       <div class="center-block">
        <ClusterValueInput
              :id="item.id"
              :columnname="item.column_name"
              :title="item.title"
              :value="item.value">
        </ClusterValueInput>
     </div>
   </div>
 </div>
</template>

<script type="x-template">

  import ClusterValueInput from './ClusterValueInput.vue';
  import axios from 'axios';

  export default {
      name: "ClusterValue",
      components: {
            ClusterValueInput,
      },
      props: ['segmentcluster'],
      data(){
        return{
          items:[],
        }
      },

      mounted: function() {
        this.fetchClusterValues();
      },

      methods: {
        fetchClusterValues: function () {
          axios.get('/api/clustervalues/d/'+this.segmentcluster)
              .then(response=>{
              this.items = response.data;
            }).catch(error =>console.log(error))
        }
      },

  }
</script>
