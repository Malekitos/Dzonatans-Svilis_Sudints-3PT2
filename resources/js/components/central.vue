<template lang="">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white dark:bg-gray-800 rounded-md text-3xl p-5 flex ">
                <div class="flex-auto font-bold ">Tasks</div>
                <div class=" bg-green-500 p-2 rounded-md"><button @click="CreateTask">New Task</button></div>
            </div>
        </div>
    </div>




</template>
<script>
export default {
    methods:{
        CreateTask(){
            $('#default-modal').modal('show')
        }
    }
}
</script >
<style lang="">

</style>
