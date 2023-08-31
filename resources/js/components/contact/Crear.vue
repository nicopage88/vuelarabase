<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Contacto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" class="form-control" v-model="contact.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea2" v-model="contact.fono" style="height: 50px"></textarea>
                                    <label for="floatingTextarea2">fono</label>
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
    name:"crear-contact",
    data(){
        return {
            contact:{
                nombre:"",
                fono:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/contact',this.contact).then(response=>{
                this.$router.push({name:"mostrarContacts"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
