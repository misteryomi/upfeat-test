<template>
    <div class="grid grid-cols-4">
        <div class="rounded-md p-4 max-w-sm w-full mx-auto" v-for="i in count" :key="i">
            <div class="animate-pulse flex space-x-4">
                <div class="flex-1 space-y-6 py-1">
                    <div class="h-64 bg-gray-400 rounded"></div>
                    <div class="space-y-3 grid justify-items-center ">
                        <div class="h-2 bg-gray-400 rounded w-4/5"></div>
                        <div class="h-2 bg-gray-400 rounded w-20"></div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</template>

<script>
export default {
    props: { count: Number},
}
</script>