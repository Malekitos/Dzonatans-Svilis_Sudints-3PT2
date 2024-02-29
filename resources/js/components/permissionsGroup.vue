<template lang="">

    <div class="mr-4">
        <a href="#" v-on:click="toggleModal()"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>


<div v-if="showModal" class=" overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class=" p-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Edding permissions</h5>

    <div class="mb-8">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
        <input type="email" id="email" v-model="permissionData.user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
    </div>

   <div class="mb-8">
    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3">
            <input @click="permissionData.permission='read'" id="horizontal-list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Read</label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3">
            <input @click="permissionData.permission='write'" id="horizontal-list-radio-id" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Write</label>
        </div>
    </li>
</ul>





<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Permissions
                </th>
                <th scope="col" class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody  v-for="(permission,index) in permissions":key="index">
            <tr v-if="permission.group===group.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{permission.user}}
                </th>
                <td class="px-6 py-4">
                    {{permission.permission}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" @click="removePermission();getPermissions()" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>





   </div>
    <button type="button" @click="toggleModal();createPermission();getPermissions()" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Add</button>
    <button type="button" @click="toggleModal();" class="float-right text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Close</button>
</div>
</div>



<div v-if="showModal" class="opacity-40 fixed inset-0 bg-black "></div>
    </div>

    <loader-component :loading-status="loadingStatus"></loader-component>

</template>
<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import axios from 'axios';
export default {
    props:{
        group: Object,
        permissions: Array,
        getPermissions: Function
    },
    data(){
        return{
            showModal: false,
            permissionData:{
                id: '',
                user: '',
                permission: '',
                groupId: this.group.id
            },
        }
    },
    methods: {
        toggleModal(){
            this.showModal = !this.showModal
        },
        createPermission(){
         this.loadingStatus = true,
         axios.post(window.location.origin + '/api/createPermission/', this.permissionData).then(response => {
             this.loadingStatus = false,
             this.notifyGood(),
             this.getPermissions()
             }).catch(errors => {
            console.log(errors);
         });
  },

  removePermission(){
            this.loadingStatus = true,
            axios.post(window.location.origin + '/api/removePermission/' + this.permissionData.id).then(response => {
                        this.loadingStatus = false,
                        notifyBad()
                    }).catch(errors => {
                    console.log(errors);
                });
                },


    notifyBad(){
        toast("Successful remove!", {
        "theme": "dark",
        "type": "error",
        "dangerouslyHTMLString": true
        })
        return { notify }
    },


  notifyGood(){
        toast("Successful add!", {
        "theme": "dark",
        "type": "success",
        "dangerouslyHTMLString": true,

        })
        return { notify }
    },
    },
}
</script>
<style lang="">

</style>
