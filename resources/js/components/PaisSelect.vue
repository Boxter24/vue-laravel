<template>    
    <div class="form-group">
    <label for="exampleFormControlSelect1">Pais</label>
    <select v-model="id" class="form-control" id="exampleFormControlSelect1">        
        <option :value="item.id" v-for="(item, index) in paises" :key="index">
            {{item.pais}}
        </option>
    </select>
  </div>    
</template>
<script>
export default {
    data(){
        return{
            paises: [],
            id: "",
        }  
    },       
    updated(){
        this.$emit("idPais",this.id)              
    },
    created(){
        axios.get('/pais').then(res=>{
            this.paises = res.data;              
        })
    },
}
</script>