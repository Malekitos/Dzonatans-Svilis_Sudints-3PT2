<template lang="">

    <div class="my-5 max-w-7xl mx-auto ">

    <div class="text-left max-w-7xl">
        <button class="transition-all duration-200  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact">
            GROUPS
            </button>
            <add-task :groupData="groupData" :getTasks="getTasks"></add-task>
        </div>

        <div>
  </div>

<!-- drawer component -->
<div id="drawer-contact" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
   <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
  </svg>GROUP MENU</h5>
   <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
      <div class="mb-6">
         <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
         <input type="text" v-model="groupData.groupName" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Group Name" required  />
      </div>
      <button type="submit" @click="createGroup()" class="text-white bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Create</button>


   <div>
    <a href="#" @click="selectGroup('General')" class="inline-flex items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
        <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
</svg>
    <span class="w-full">General</span>

</a>
    </div>

    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr  v-for="(group,index) in groups":key="index">
                <td v-if="checkAccess(group.owner)">
                    <a href="#" @click="selectGroup(group.name)" class="inline-flex items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
            </svg>
                <span class="w-full">{{group.name}}</span>
                </a>
                </td>
                <td v-if="checkAccess(group.owner)">
                    <permissions-group :group="group" :permissions="permissions" :getPermissions="getPermissions"></permissions-group>
                </td>
                <td v-if="checkAccess(group.owner)">
                    <remove-group :group="group" :getGroups="getGroups"></remove-group>
                </td>
            </tr>

        </tbody>
    </table>
   <div>
    </div>

</div>


            <div class="text-white rounded-md text-3xl">
        <div class="relative overflow-x-auto rounded-md ">
            <table class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>

                    </tr>
                </thead>
                <tbody v-for="(task,index) in tasks":key="index">

                        <tr v-if="checkGroup(task.grupa)" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td v-if="!task.status" scope="row" class="px-6 {{completed}} py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{task.title}}
                        </td>
                        <td v-if="task.status"  scope="row" class="px-6 {{completed}} py-4 font-medium text-gray-900 whitespace-nowrap dark:text-green-500 underline underline-offset-auto">
                            {{task.title}}
                        </td>
                        <td class="px-6 py-4">
                            {{task.date}}
                        </td>
                        <td class="px-6 py-4" >
                        {{task.time}}
                        </td>
                        <td class="px-6 py-4" >
                            {{task.detail.length <= 20 ? task.detail : task.detail.substr(0,20)+'...'}}
                        </td>
                        <td class="px-6 py-4 text-right" >
                            <remove-task :task="task" @click="getTasks()"/>
                        </td>
                        <td class="text-right" >
                            <edit-task :task="task" @click="getTasks()"></edit-task>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" v-if="!task.status" @click="completeTask(task)" class="font-medium text-red-600 dark:text-green-500 hover:underline">Complete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
        </div>
  <div>

    <loader-component :loading-status="loadingStatus"></loader-component>

  </div>
</template>


<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }

 import axios from 'axios';
    export default {
        props : ({
        user: Object
    }),
        setup() {
   },

  name: "large-modal",
  data() {
    return {
      dateEntered: false,
      showModal: false,
      error: '',
      header: 'Add new task',
      footerCreate: 'CREATE TASK',
      editMode: false,
      correctGroup: false,
      insertGroup:'',
      taskData: {
        id: '',
        title: '',
        date: '',
        time: '',
        detail: '',
        status: 0,
      },
      groupData:{
        groupName: 'General',
        groupOwner: this.user.email
      },
      tasks: [],
      groups: [],
      permissions: [],
      pareizaGrupa:[],
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
  checkGroup(grupa){
    if(grupa===this.groupData.groupName){
        return true
    }
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
    this.taskData.id = 0
  },
    getTasks(){
        this.loadingStatus = true,
        axios.get(window.location.origin + '/api/getTasks/').then(response =>{
        this.tasks = response.data,
        this.loadingStatus = false
        }).catch(error => {
        console.log(error)
        });
    },
    toggleModal: function(){
      this.showModal = !this.showModal;
    },
    isEmpty(value) {
    return value.trim() === '';
  },

  completeTask(task){
    this.loadingStatus = true,
    this.taskData = {
       id: task.id,
       status: 1,
    }

    axios.post(window.location.origin + '/api/completeTask/' + this.taskData.id, this.taskData.status).then(response => {
                this.getTasks(),
                this.loadingStatus = false
             }).catch(errors => {
            console.log(errors);
         });
    this.taskData.status = 0
  },

  clearData(){
    this.error = '',
    this.taskData.title = '',
    this.taskData.date = '',
    this.taskData.time = '',
    this.taskData.detail = '',
    this.taskData.id = 0
  },

  createGroup(){
    this.loadingStatus = true,
    axios.post(window.location.origin + '/api/createGroup/', this.groupData).then(response => {
             this.getGroups(),
             this.loadingStatus = false,
             this.notifyGood()
             }).catch(errors => {
            console.log(errors);
         });
  },

        getGroups(){
            this.loadingStatus = true,
            axios.get(window.location.origin + '/api/getGroups/').then(response =>{
                this.groups = response.data,
                this.loadingStatus = false
            }).catch(error => {
                console.log(error)
            });
},

        getPermissions(){
            this.loadingStatus = true,
            axios.get(window.location.origin + '/api/getPermissions/').then(response =>{
                this.permissions = response.data,
                this.loadingStatus = false
            }).catch(error => {
                console.log(error)
            });
        },

        selectGroup(select){
            this.groupData.groupName = select
        },

        checkAccess(groupUser){
            if(groupUser===this.groupData.groupOwner){
                return true
            }else{
                return false
            }
        },

        // checkPermissions(groupId){

        //    this.pareizaGrupa = this.permissions.filter(item => item.group === groupId)
        //     console.log(this.pareizaGrupa.length)
        //    if(this.pareizaGrupa.length === 0){
        //     return false
        //    }else{
        //     return true
        //    }
        // },

        notifyGood(){
        toast("Successful add!", {
        "theme": "dark",
        "type": "success",
        "dangerouslyHTMLString": true,

        })
        return { notify }
    },
    notifyBad(){
        toast("Successful remove!", {
        "theme": "dark",
        "type": "error",
        "dangerouslyHTMLString": true
        })
        return { notify }
    },
    notifyEdit(){
        toast("Successful edit!", {
        "theme": "dark",
        "type": "info",
        "dangerouslyHTMLString": true
        })
        return { notify }
    }
    },

    mounted() {
        this.getTasks(),
        this.getGroups(),
        this.getPermissions()
    },
    }
</script>


<style>
</style>
