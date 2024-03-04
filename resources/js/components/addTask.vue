<template lang="">

            <button v-on:click="toggleModal()" @click="clearData()" type="button" class="float-right transition-all duration-200  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">NEW TASK</button>

<div v-if="showModal" class=" overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-auto my-6 mx-auto max-w-6xl ">
        <!--content-->
        <div class="border-0 rounded-md shadow-lg relative flex flex-col w-full bg-gray-800 outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-gray-600">
            <h3 class="text-3xl font-medium leading-6 text-gray-200">
              {{header}}
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" v-on:click="toggleModal()">
              <span class="bg-transparent text-black opacity-5 h-5 w-6 text-2xl block outline-none focus:outline-none">
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto">
                    <div class="grid gap-6 mb-3 md:grid-cols-3">


        <div>
            <label for="first_name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="first_name" v-model="taskData.title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
            <input type="date" id="last_name"  v-model="taskData.date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
        </div>
        <div>
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">time</label>
            <input type="time" id="company" v-model="taskData.time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required />
        </div>
    </div>
    <div class="mb-6">
            <label for="message"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail</label>
            <textarea id="message"  v-model="taskData.detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
     </div>


                        <div><span  class="text-red-500 underline text-xl">{{error}}</span></div>

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

    <div v-if="showModal" class="opacity-40 fixed inset-0 z-30 bg-black "></div>



</template>
<script>
export default {

    props:{
            groupData:{
            type: Array,
        },
            getTasks:{
                type: Function
            }
        },

    data(){
        return{
      dateEntered: false,
      showModal: false,
      error: '',
      header: 'Add new task',
      footerCreate: 'CREATE TASK',
      tasks: [],
      taskData: {
        id: '',
        title: '',
        date: '',
        time: '',
        detail: '',
        status: 0,
      },
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
  storeTask(){
        this.loadingStatus = true,
          axios.post(window.apiUrl, {
            var1: this.taskData,
            var2: this.groupData
          }).then(response => {
            this.loadingStatus = true,
           this.getTasks(),
           this.notifyGood()
             }).catch(errors => {
            console.log(errors);
         });
         this.error = '',
         this.taskData.title = '',
         this.taskData.date = '',
         this.taskData.time = '',
         this.taskData.detail = '',
         this.taskData.status = 0
        },
}
}
</script>
<style lang="">

</style>
