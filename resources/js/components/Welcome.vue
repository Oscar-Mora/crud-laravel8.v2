<template> 
  <Index 
    v-if="currentView== 'index'" 
    @changeCurrentView="changeCurrentView"
    @setContactToEdit="setContactToEdit"
    :currentView="currentView" />
  <Form 
    v-if="currentView == 'form'" 
    @changeCurrentView="changeCurrentView"
    @setContactToEdit="setContactToEdit"
    :currentView="currentView" 
    :contact_id="contactToEdit" />
    <!-- @openView="openView('contact_id', 'state')"  -->
  <ViewContact 
  v-if="currentView == 'viewContact'" 
  @changeCurrentView="changeCurrentView"
  @setContactToEdit="setContactToEdit"
  :contact_id="contactToEdit"
  />
</template>
<script>
import Index from './Index.vue';
import Form from './Form.vue';
import ViewContact from './ViewContact.vue';

export default {
  components:{
    Index,
    Form,
    ViewContact
  },
  data(){
    return {
      currentView: 'index',
      contactToEdit: null,
      // contactToWatch: null
    }
  },
  methods:{
    changeCurrentView(viewName){
      this.currentView = viewName;
    },
    setContactToEdit(id){
      this.contactToEdit = id;
    },
  
  
  }
}
</script>
