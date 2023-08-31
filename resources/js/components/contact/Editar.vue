<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Fono</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" class="form-control" v-model="contact.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">

                                <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea2" v-model="contact.fono" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Fono</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editar-contact",
    data(){
        return {
            contact:{
                nombre:"",
                fono:"",
            }
        }
    },
    mounted(){
        this.mostrarContact()
    },
    methods:{
        async mostrarContact(){
            await this.axios.get(`/api/contact/${this.$route.params.id}`).then(response=>{
                const { titulo, contenido } = response.data
                this.contact.titulo = titulo
                this.contact.contenido = contenido
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/contact/${this.$route.params.id}`,this.contact).then(response=>{
                this.$router.push({name:"mostrarContacts"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
