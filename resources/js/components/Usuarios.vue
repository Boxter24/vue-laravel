<template>
    <div>
        <div class="container">                                                                
            <form @submit.prevent="editarUsuario(usuario)" v-if="edit">
                <h3>Editar Usuario</h3>
                <input type="text" placeholder="Nombre" class="form-control mt-2 mb-2" v-model="usuario.name">
                <input type="text" placeholder="Apellido" class="form-control mb-2" v-model="usuario.apellido">
                <input type="number" placeholder="Telefono" class="form-control mb-2" v-model="usuario.telefono">
                <input type="email" placeholder="Email" class="form-control mb-2" v-model="usuario.email">
                <input type="text" placeholder="Direccion" class="form-control mb-2" v-model="usuario.direccion">
                <input type="password" placeholder="CI" class="form-control mb-2" v-model="usuario.password">                
                <button class="btn btn-primary bg-blue-600" type="submit">Editar</button>
            </form>   
            <form @submit.prevent="agregar()" v-else>
                <h3>Agregar Usuario</h3>
                <input type="text" placeholder="Nombre" class="form-control mt-2 mb-2" v-model="usuario.name">
                <input type="text" placeholder="Apellido" class="form-control mb-2" v-model="usuario.apellido">
                <input type="number" placeholder="Telefono" class="form-control mb-2" v-model="usuario.telefono">
                <input type="email" placeholder="Email" class="form-control mb-2" v-model="usuario.email">
                <input type="text" placeholder="Direccion" class="form-control mb-2" v-model="usuario.direccion">
                <input type="password" placeholder="CI" class="form-control mb-2" v-model="usuario.password">                
                <button class="btn btn-primary bg-blue-600" type="submit">Guardar</button>
            </form>            
        </div> 
        <div class="mt-3"> 
            <h2>Lista de Usuario</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th> 
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th> 
                    <th scope="col">Email</th> 
                    <th scope="col">Direccion</th>        
                    <th scope="col">Opciones</th>                     
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in usuarios" :key="index">
                        <th scope="row">{{item.id}}</th>
                        <td>{{item.name}}</td>
                        <td>{{item.apellido}}</td>
                        <td>{{item.telefono}}</td>
                        <td>{{item.email}}</td>
                        <td>{{item.direccion}}</td>                                               
                        <td class="">
                            <button class="btn btn-warning btn-sm d-inline" @click="editarForm(item)">Editar</button>
                            <button class="btn btn-danger btn-sm d-inline" @click="eliminarUsuario(item, index)">Eliminar</button>
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
            usuarios: [],
            usuario: {
                name:"",
                apellido:"",
                telefono:"",
                email:"",
                direccion:"",
                password:"",                
            },
            edit: false,
        }        
    },
    created(){
        axios.get('/usuario').then(res=>{
        this.usuarios = res.data;
        })
    },
    methods:{
        agregar(){            
            if(this.usuario.name === '' || this.usuario.apellido === '' || this.usuario.telefono === '' || this.usuario.email === '' || this.usuario.direccion === '' || this.usuario.password === ''){
                alert('No pueden haber campos vacios, complete por favor.');
                return;
            }
            
            const params = {
                name: this.usuario.name,
                apellido: this.usuario.apellido,
                telefono: this.usuario.telefono,
                email: this.usuario.email,
                direccion: this.usuario.direccion,
                password: this.usuario.password,
            }
            this.usuario.name = "";
            this.usuario.apellido = "",
            this.usuario.telefono = "",
            this.usuario.email = "",
            this.usuario.direccion = "",
            this.usuario.password = "",
            axios.post("/usuario",params)
                .then(res => {
                    this.usuarios.push(res.data)
                })
        },
        eliminarUsuario(item, index){
            const confirmacion = confirm(`Eliminar Usuario ${item.name}`);
            if(confirmacion){
                axios.delete(`/usuario/${item.id}`)
                .then(()=>{
                    this.usuarios.splice(index, 1);
                })
            }
        },
        editarForm(item){
            this.edit = true;
            this.usuario.name = item.name;
            this.usuario.apellido = item.apellido;
            this.usuario.telefono = item.telefono;
            this.usuario.email = item.email;
            this.usuario.direccion = item.direccion;
            this.usuario.password = item.password;
            this.usuario.id = item.id;
        },
        editarUsuario(item){                   
            const params = {
                name: item.name,
                apellido: item.apellido,
                apellido: item.telefono,
                email: item.email,
                direccion: item.direccion,
                password: item.password,
            };            
            this.usuario.name = "";
            this.usuario.apellido = "",
            this.usuario.telefono = "",
            this.usuario.email = "",
            this.usuario.direccion = "",
            this.usuario.password = "",
            axios.put(`/usuario/${item.id}`,params)
                .then(res => {
                    this.edit = false;
                    const index = this.usuario.findIndex(buscar => buscar.id === res.data.id)                    
                    this.usuarios[index].name = res.data.name;
                    this.usuarios[index].apellido = res.data.apellido;
                    this.usuarios[index].telefono = res.data.telefono;
                    this.usuarios[index].email = res.data.email;
                    this.usuarios[index].direccion = res.data.direccion;
                    this.usuarios[index].password = res.data.password;
                })                                         
        }
    },
}


</script>
