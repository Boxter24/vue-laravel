<template>
    <div>
        <div class="container">                                                                
            <form @submit.prevent="editarEstado(estado)" v-if="edit">
                <h3>Editar Estado</h3>
                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="estado.name">
                <button class="btn btn-primary bg-blue-600" type="submit">Editar</button>
            </form>   
            <form @submit.prevent="agregar()" v-else>
                <h3>Agregar Estado</h3>
                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="estado.name">
                <select name="Pais">
                    <option v-for="(item, index) in estados" :key="index" value="item.pais">
                        
                    </option>
                </select>
                <button class="btn btn-primary bg-blue-600" type="submit">Guardar</button>
            </form>            
        </div> 
        <div class="mt-3"> 
            <h2>Lista de estado</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>                
                    <th scope="col">Opciones</th> 
                    </tr>
                </thead>                
                <tbody>
                    <tr v-for="(item, index) in estados" :key="index">
                        <th scope="row">{{item.id}}</th>
                        <td>{{item.name}}</td>
                        <td class="">
                            <button class="btn btn-warning btn-sm d-inline" @click="editarForm(item)">Editar</button>
                            <button class="btn btn-danger btn-sm d-inline" @click="eliminarEstado(item, index)">Eliminar</button>
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
            estados: [],
            estado: {name:""},
            edit: false,
        }        
    },
    created(){
        axios.get('/estado').then(res=>{
            this.estados = res.data;  
            console.log(this.estado);     
        })
    },
    methods:{
        agregar(){            
            if(this.estado.name === ''){
                alert('No pueden haber campos vacios, complete por favor.');
                return;
            }
            console.log(this.estado.name)
            const params = {
                name: this.estado.name,
            }
            this.estado.name = "";
            axios.post("/estado",params)
                .then(res => {
                    this.estados.push(res.data)
                })
        },
        eliminarEstado(item, index){
            const confirmacion = confirm(`Eliminar Estado ${item.name}`);
            if(confirmacion){
                axios.delete(`/estado/${item.id}`)
                .then(()=>{
                    this.estados.splice(index, 1);
                })
            }
        },
        editarForm(item){
            this.edit = true;
            this.estado.name = item.name;
            this.estados.id = item.id;
        },
        editarEstado(item){                   
            const params = {name: item.name};            
            axios.put(`/estado/${item.id}`,params)
                .then(res => {
                    this.edit = false;
                    const index = this.estados.findIndex(buscar => buscar.id === res.data.id)                    
                    this.estados[index].name = res.data.name;
                })                                         
        }
    },
}


</script>