<template> 
  <Index v-if="currentView== 'index'" :currentView="currentView" @changeCurrentView="changeCurrentView"/>
  <Form v-if="currentView == 'form'" @changeCurrentView="changeCurrentView"/>
</template>
<script>
import Index from './Index.vue';
import Form from './Form.vue';
export default {
  components:{
    Index,
    Form,
  },
  data(){
    return {
      currentView: 'index'
    }
  },
  methods:{
    changeCurrentView(viewName){
      this.currentView = viewName;
    }
  }
}
</script>
