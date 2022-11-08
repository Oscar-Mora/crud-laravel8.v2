<template>
    <div class="flex flex-col items-center text-justify min-h-screen -mx-32 px-6 py-4 bg-gray-100 sm:justify-center sm:pt-0  "
    
    v-for="atributos in el" 
    :key="atributos">
    
        <div class="flex flex-row items-center mx-32 pt-4 px-6 py-4 bg-gray-100 sm:justify-center sm:pt-2  ">
            <h1 class="text-4xl"> Datos del Contacto</h1>
        </div>
        <div class="flex flex-row items-center  -mx-32 px-6 py-2 bg-gray-100 sm:justify-center sm:pt-0  ">
        <div class="flex flex-col items-center border  p-3 bg-gray-100 sm:justify-center sm:pt-0" >
            <h3 class="text-2xl">No. de Contacto</h3>
            <p> {{atributos.id}} </p>
        </div>    
        <div  class="flex flex-col items-center  border p-3 bg-gray-100 sm:justify-center sm:pt-0">
            <h3 class="text-2xl">Nombre</h3>
            <p> {{atributos.name}} </p>
        </div>
        <div class="flex flex-col items-center border  p-3 bg-gray-100 sm:justify-center sm:pt-0" >
            <h3 class="text-2xl">Apellido</h3>
            <p>{{atributos.last_name}}</p>
        </div>
        <div  class="flex flex-col items-center border p-3 bg-gray-100 sm:justify-center sm:pt-0">
            <h3 class="text-2xl">Teléfono</h3>
            <p>{{atributos.phone}}</p>
        </div>    
        <div  class="flex flex-col items-center border  p-3 bg-gray-100 sm:justify-center sm:pt-0">
            <h3 class="text-2xl">Correo Electrónico</h3>
            <p>{{atributos.email}}</p>
        </div>    
    </div>
    </div>
    <div class="flex flex-col items-center justify-center  bg-gray-100 ">
    <button type="submit" @click="changeView('index')" class="bg-blue-300 hover:bg-blue-500 text-gray-200 font-bold py-2 px-4 rounded">Volver</button>
    </div>    
</template>

<script>
export default{
    props:{
        contact_id:{
            type:Number,
            required:true
        },
        contactToEdit: null,
    },
data(){
        return{
            el:[],
            // state:null
        }
    },
    mounted(){
        // console.log(this.contact_id);
        axios.get(`/api/get-contact/${this.contact_id}`)
            .then( (response) => {
                // console.log(response);
                this.el = [response.data];
                
                console.log(this.el);
            });
    },
    methods:{
        changeView(view){
            this.$emit('changeCurrentView', view);
            this.$emit("setContactToEdit", null);
        },
    }

}
</script>
