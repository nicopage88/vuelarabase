<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearContact"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="contact in contacts" :key="blog.id">
                                    <td>{{ contact.id }}</td>
                                    <td>{{ contact.nombre }}</td>
                                    <td>{{ contact.fono }}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarContact",params:{id:contact.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarContact(contact.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"contacts",
    data(){
        return {
            contacts:[]
        }
    },
    mounted(){
        this.mostrarContacts()
    },
    methods:{
        async mostrarContacts(){
            await this.axios.get('/api/contact').then(response=>{
                this.contacts = response.data
            }).catch(error=>{
                console.log(error)
                this.contacts = []
            })
        },
        borrarBlog(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/contact/${id}`).then(response=>{
                    this.mostrarContacts()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
