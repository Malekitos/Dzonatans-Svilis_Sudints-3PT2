<template lang="">
    <div>

        <div v-if="loadingStatus" class="flex justify-center items-center h-96">
            <half-circle-spinner
            :animation-duration="1000"
            :size="60"
            color="#ff1d5e"
            />
            <div class="opacity-40 fixed inset-0 bg-black "></div>
        </div>



</div>
</template>
<script>
import { HalfCircleSpinner } from 'epic-spinners'
export default {
    components: {
        HalfCircleSpinner
    },
    props: ['loadingStatus'],
    }

</script>
<style lang="">

</style>
