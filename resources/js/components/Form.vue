<template>
   <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
          <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
              Crear contacto
            </h1>
          </div>

          <div class="w-full px-6 py-4 bg-slate-500 rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" @submit.prevent="saveContact()">
              <!-- Title -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="name">
                  Nombres
                </label>

                <input
                  v-model="form.name"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="name" id="name" />
              </div>
              <div>
                <label class="block text-sm font-bold text-gray-700" for="last_name">
                  Apellidos
                </label>

                <input
                  v-model="form.last_name"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="last_name" id="last_name"/>
              </div>

              <div>
                <label class="block text-sm font-bold text-gray-700" for="phone">
                  Telefono
                </label>

                <input
                  v-model="form.phone"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="phone" id="phone" />
              </div>

              <div>
                <label class="block text-sm font-bold text-gray-700" for="email">
                  Email
                </label>

                <input
                  v-model="form.email"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="email" name="email" id="email" />
              </div>

              <div class="flex items-center justify-start mt-4 gap-x-2">
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Guardar
                </button>
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Cancelar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name: null,
                last_name: null,
                phone: null,
                email: null,
            }
        }
    },
    methods:{
        saveContact(){
            axios.post('/api/create', {form: this.form})
                .then( (response) => {
                    this.$emit("changeCurrentView", 'index');
                })
                .catch( (error) => {
                    console.log(error.response);
                });
        }
    }

}
</script>

<style>

</style>