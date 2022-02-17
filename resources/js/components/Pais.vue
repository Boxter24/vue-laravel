<template>
    <div>
        <div class="container">                                                                
            <form @submit.prevent="editarPais(pais)" v-if="edit">
                <h3>Editar Pais</h3>
                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="pais.name">
                <button class="btn btn-primary bg-blue-600" type="submit">Editar</button>
            </form>   
            <form @submit.prevent="agregar()" v-else>
                <h3>Agregar Pais</h3>
                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="pais.name">
                <button class="btn btn-primary bg-blue-600" type="submit">Guardar</button>
            </form>            
        </div> 
        <div class="mt-3"> 
            <h2>Lista de Paises</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>                
                    <th scope="col">Opciones</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in paises" :key="index">
                        <th scope="row">{{item.id}}</th>
                        <td>{{item.pais}}</td>
                        <td class="">
                            <button class="btn btn-warning btn-sm d-inline" @click="editarForm(item)">Editar</button>
                            <button class="btn btn-danger btn-sm d-inline" @click="eliminarPais(item, index)">Eliminar</button>
                        </td>                        
                    </tr>                
                </tbody>
            </table>
        </div> 
    </div>     
</template>

<script>
export default{
    data(){
        return{
            paises: [],
            pais: {name:""},
            edit: false,
        }        
    },
    created(){
        axios.get('/pais').then(res=>{
        this.paises = res.data;
        })
    },
    methods:{
        agregar(){            
            if(this.pais.name === ''){
                alert('No pueden haber campos vacios, complete por favor.');
                return;
            }
            console.log(this.pais.name)
            const params = {
                pais: this.pais.name,
            }
            this.pais.name = "";
            axios.post("/pais",params)
                .then(res => {
                    this.paises.push(res.data)
                })
        },
        eliminarPais(item, index){
            const confirmacion = confirm(`Eliminar Pais ${item.pais}`);
            if(confirmacion){
                axios.delete(`/pais/${item.id}`)
                .then(()=>{
                    this.paises.splice(index, 1);
                })
            }
        },
        editarForm(item){
            this.edit = true;
            this.pais.name = item.pais;
            this.pais.id = item.id;
        },
        editarPais(item){                   
            const params = {pais: item.name};            
            axios.put(`/pais/${item.id}`,params)
                .then(res => {
                    this.edit = false;
                    const index = this.paises.findIndex(buscar => buscar.id === res.data.id)                    
                    this.paises[index].pais = res.data.pais;
                })                                         
        }
    },
}


</script>
