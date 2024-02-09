<template>
    
       <div className="container">
        <input type="text" v-model="userName" placeholder="Nickname">
        <input type="password" v-model="userPass" placeholder="Password">
        <input type="email" v-model="userEmail" placeholder="Email">
        <button @click="sendData()">Check</button>
        <p className="error">{{ error }}</p>

        <div id="users" v-for="(element, index) in users" :key="index">

            <p>Name: {{ element.name}} Password: {{ element.password }} Email: {{ element.email }}</p>

        </div>

        <div v-if="userName=='Egor'"> <p>Your welcome, gay </p> </div>

       </div>
        
</template>
<script>
export default {
    data(){
        return{
            users: [],
            userName: '',
            userPass: '',
            userEmail: '',
            error: ''
        }
    },
    methods: {
      sendData() {


        if(this.userName==''){
            this.error = 'Login required'
            return
        }else{
            if(this.userPass==''){
                this.error = 'Password required'
               return
            }else{
                if(this.userEmail==''){
                    this.error = 'Email required'
                    return
                }else{
                    this.error = 'Idealjno'
                }
            }
        }

        this.users.push({
            name: this.userName,
            password: this.userPass,
            email: this.userEmail
        })
      }
    }
}
</script>


<style>
*{
    transition: all linear .1s;
    background-color: black;
}
.container{
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 2rem;
}

input,button{
    background-color: black;
    border: 1px solid white;
    margin: .5rem;
    padding: .3rem;
    border-radius: .4rem;
    width: 13rem;
    color: white;
}
input:hover,button:hover{
    background-color: rgb(29, 28, 28);
}

p{
    color: brown;
}
</style>