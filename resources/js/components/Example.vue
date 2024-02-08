<template>
    
       <div id="container">
        <input type="text" v-model="userName" placeholder="Nickname">
        <input type="password" v-model="userPass" placeholder="Password">
        <input type="email" v-model="userPass" placeholder="Email">

        <p className="error">{{ error }}</p>

            <button @click="userData('some new')">Login</button>
        

            <h3>{{ info }}</h3>
       </div>
        
</template>
<script>
export default {
    data(){
        return{
            info: 'Title'
        }
    },
    methods: {
        userData(word = 'new text'){
            this.info = word
        }
    },
}
</script>


<style >
 
</style>