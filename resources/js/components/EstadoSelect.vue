<template>    
    <div class="form-group">
    <label for="exampleFormControlSelect1">Estado</label>
    <select v-model="id" class="form-control" id="exampleFormControlSelect1">           
        <option :value="item.id" v-show="idPais == item.pais_id" v-for="(item, index) in estados" :key="index">
            <span v-if="idPais == item.pais_id">{{item.name}}</span>
        </option>
    </select>
  </div>    
</template>
<script>
export default {
    data(){
        return{
            estados: [],
            id: "",
        }  
    },           
    created(){
        axios.get('/estado').then(res=>{
            this.estados = res.data;              
        })
    },
    updated(){
        this.$emit("idEstado",this.id)              
    },
    props:[
        "idPais",
    ]
}
</script>