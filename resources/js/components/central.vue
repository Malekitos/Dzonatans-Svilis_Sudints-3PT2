<template lang="">

    <div class="my-10 max-w-7xl mx-auto ">
            <div class="text-white dark:bg-gray-800 rounded-md text-3xl flex items-center py-2 my-5">
                <div class="mx-3 flex-auto font-bold ">Tasks</div>
               <div> <button v-on:click="toggleModal()" @click="clearData()" type="button" class="transition-all duration-200  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">NEW TASK</button></div>
            </div>


            <div class="text-white rounded-md text-3xl">
        <div class="relative overflow-x-auto rounded-md">
            <table class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Details
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="(task,index) in tasks":key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                        <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                    </td>
                        <th scope="row" class="px-6 {{completed}} py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{task.title}}
                        </th>
                        <td class="px-6 py-4">
                            {{task.date}}
                        </td>
                        <td class="px-6 py-4">
                        {{task.time}}
                        </td>
                        <td class="px-6 py-4">
                            {{task.detail.length <= 20 ? task.detail : task.detail.substr(0,20)+'...'}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" @click="editTask(task)" v-on:click="toggleModal()"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" @click="removeTask(task)"  class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

            </div>
        </div>

  <div>

    <div v-if="showModal" class=" overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-auto my-6 mx-auto max-w-6xl ">
        <!--content-->
        <div class="border-0 rounded-md shadow-lg relative flex flex-col w-full bg-gray-800 outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-gray-600">
            <h3 class="text-4xl font-medium leading-6 text-gray-200">
              {{header}}
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
                    @click="!editMode ? storeTask() : updateTask()"

                    v-if="isFormValid"
                    class="float-start border-2 rounded-md border-green-600 text-green-600 background-transparent font-bold uppercase p-2 px-4 py-2 outline-none focus:outline-none ease-linear transition-all duration-150 hover:bg-green-600 hover:text-white"
                    type="button"
                    v-on:click="toggleModal()"
                    >
                    {{footerCreate}}
        </button>
        <button
                    v-else
                    @click="checkFields()"
                    class=" cursor-not-allowed float-start border-2 rounded-md border-gray-600 text-gray-600 background-transparent font-bold uppercase p-2 px-4 py-2 outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button"
                    >
                    {{footerCreate}}
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
      header: 'Add new task',
      footerCreate: 'CREATE TASK',
      editMode: false,
      taskData: {
        id: '',
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
      this.getTasks();
    },
    isEmpty(value) {
    return value.trim() === '';
  },
  updateTask(){
    axios.post(window.location.origin + '/api/updateTask/' + this.taskData.id, this.taskData).then(response => {
                this.getTasks()
             }).catch(errors => {
            console.log(errors);
         });
         this.error = '',
         this.taskData.title = '',
         this.taskData.date = '',
         this.taskData.time = '',
         this.taskData.detail = '',
         this.editMode = 'false'
  },
  editTask(task){
    this.editMode = true,
    this.header = 'Edit task',
    this.footerCreate = 'EDIT TASK',
    this.taskData = {
        id: task.id,
        title: task.title,
        date: task.date,
        time: task.time,
        detail: task.detail,
    }
  },
  removeTask(task){
    this.taskData = {
        id: task.id,
        title: task.title,
        date: task.date,
        time: task.time,
        detail: task.detail,
    }
    axios.post(window.location.origin + '/api/removeTask/' + this.taskData.id).then(response => {
                this.getTasks()
             }).catch(errors => {
            console.log(errors);
         });
  },
  clearData(){
    this.editMode = false,
    this.header = 'Add new task',
    this.footerCreate = 'CREATE TASK',
    this.error = '',
    this.taskData.title = '',
    this.taskData.date = '',
    this.taskData.time = '',
    this.taskData.detail = '',
    this.taskData.id = ''
  },
  storeTask(){
          axios.post(window.apiUrl, this.taskData).then(response => {
            this.getTasks()
             }).catch(errors => {
            console.log(errors);
         });
         this.error = '',
         this.taskData.title = '',
         this.taskData.date = '',
         this.taskData.time = '',
         this.taskData.detail = ''
        },
    getTasks(){
            axios.get(window.location.origin + '/api/getTasks/').then(response =>{
                this.tasks = response.data
            }).catch(error => {
                console.lor(errors)
            });
        }
      },
    mounted() {
        this.getTasks()
    },
    }

</script>


<style>


</style>
