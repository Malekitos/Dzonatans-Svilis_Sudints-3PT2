<template lang="">
    <div>
        <button @click="toggleModal()" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>


<div v-if="showModal" class=" overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="text-left max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Remove Task</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Do you want remove "{{group.name}}"?.</p>

    <button type="button" @click="toggleModal()" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">No</button>
    <button type="button" @click="toggleModal();removeGroup()" class="float-end text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Yes</button>
</div>
</div>

<div v-if="showModal" class="opacity-40 fixed inset-0 bg-black "></div>

    </div>

</template>
<script>
export default {
    props:{
        group: Object
    },
    data(){
        return{
            showModal: false
        }
    },
    methods: {
        toggleModal(){
            this.showModal = !this.showModal
        },

        removeGroup(){
    axios.post(window.location.origin + '/api/removeGroup/' + this.group.name).then(response => {
             }).catch(errors => {
            console.log(errors);
         });
        },
    },
}
</script>
<style lang="">

</style>
