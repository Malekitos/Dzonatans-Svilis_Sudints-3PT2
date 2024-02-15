<template lang="">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white dark:bg-gray-800 rounded-md text-3xl p-5 flex ">
                <div class="flex-auto font-bold ">Tasks</div>
                <div class=" bg-indigo-700 rounded-md p-2 px-4 py-2 hover:bg-indigo-800"><button v-on:click="toggleModal()">New Task</button></div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white dark:bg-gray-800 rounded-md text-3xl p-5 ">

                <table class="table-auto">
                    <thead>
                       <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date & Time</th>
                            <th>Detail</th>
                            <th>Actions</th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(task,index) in tasks":key="index">
                            <td>{{index + 1}}</td>
                            <td>{{task.title}}</td>
                            <td>{{task.date}} | {{task.time}}</td>
                            <td>{{task.detail.length < 10 ? task.detail : task.detail.substr(0,10)+'...'}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

  <div>

    <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-auto my-6 mx-auto max-w-6xl">
        <!--content-->
        <div class="border-0 rounded-md shadow-lg relative flex flex-col w-full bg-gray-800 outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-gray-600">
            <h3 class="text-4xl font-medium leading-6 text-gray-200">
              Add new Task
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" v-on:click="toggleModal()">
              <span class="bg-transparent text-black opacity-5 h-5 w-6 text-2xl block outline-none focus:outline-none">
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto">
            <div class="mt-2">
                <p class="text-xl text-white">

                    <div class=" border-indigo-700 text-2xl text-gray-200">

                        <input type="text" v-model="taskData.title" placeholder="Title" class="bg-gray-800 text-2xl m-4 ml-0">
                        <input type="date" v-model="taskData.date" class="bg-gray-800 text-2xl m-4" >
                        <input type="time" v-model="taskData.time" class="bg-gray-800 text-2xl m-4 mr-0">

                        <div class="">
                            <input type="text" v-model="taskData.detail" placeholder="Details" class="bg-gray-800 text-2xl m-4 ml-0 w-full pb-16">
                        </div>

                        <span  class="text-red-500 underline">{{error}}</span>
                    </div>

                </p>
              </div>
          </div>
          <!--footer-->
          <div class="p-6 border-t border-solid border-gray-600">


        <button
                    @click="storeTask()"
                    v-if="isFormValid"
                    class="float-start border-2 rounded-md border-green-600 text-green-600 background-transparent font-bold uppercase p-2 px-4 py-2 outline-none focus:outline-none ease-linear transition-all duration-150 hover:bg-green-600 hover:text-white"
                    type="button"
                    v-on:click="toggleModal()"
                    >
                    Create Task
                    </button>
                    <button
                    v-else
                    @click="checkFields()"
                    class="float-start border-2 rounded-md border-gray-600 text-gray-600 background-transparent font-bold uppercase p-2 px-4 py-2 outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button"
                    >
                    Create Task
        </button>

            <button class="float-end text-red-500 bg-transparent border-2 border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase p-2 px-4 py-2 rounded-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" v-on:click="toggleModal()">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
  </div>




</template>


<script>
import axios from 'axios';

    export default {
  name: "large-modal",
  data() {
    return {
      dateEntered: false,
      showModal: false,
      error: '',
      taskData: {
        title: '',
        date: '',
        time: '',
        detail: '',
      },
      tasks: [],
    }
  },
  computed: {
  isFormValid() {
    return (
      !this.isEmpty(this.taskData.title) &&
      !this.isEmpty(this.taskData.date) &&
      !this.isEmpty(this.taskData.time)&&
      !this.isEmpty(this.taskData.detail)
      // Add more conditions for other fields if needed
    );
  },
  checkFields(){
        if(this.taskData.title == ''){
            this.error = 'Title required!'
            this.dateEntered = false
            return
        }else{
            if(this.taskData.date == ''){
            this.error = 'Date required!'
            this.dateEntered = false
            return
        }else{
            if(this.taskData.time == ''){
            this.error = 'Time required!'
            this.dateEntered = false
            return
        }else{
            if(this.taskData.detail == ''){
            this.error = 'Detail required!'
            this.dateEntered = false
            return
        }else{
                this.error = ''
                this.dateEntered = true
            }
        }
        }
        }
    },
},
  methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    },
    isEmpty(value) {
    return value.trim() === '';
  },
  storeTask(){
          axios.post(window.apiUrl, this.taskData).then(response => {
             console.log(response.data);
             }).catch(errors => {
            console.log(errors);
         });
         this.error = '',
         this.taskData.title = '',
         this.taskData.date = '',
         this.taskData.time = '',
         this.taskData.detail = ''
        //  window.location.reload();
        },
    getTasks(){
            axios.get( window.location.origin + '/api/getTasks').then(response =>{
                this.tasks = response.data
            }).catch(error => {
                console.lor(errors)
            });
        }
      },
    mounted() {
        this.getTasks()
    },
    reloadPage() {
    window.location.reload();
    }
    }

</script>


<style>


</style>
