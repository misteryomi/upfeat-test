<template>
    <input v-bind="$attrs" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400" />

        <!-- <input 
                @input="$emit('input', $event.target.value)"
                :type="type ? type : 'text'" 
                :name="name" 
                :value="value"
                :id="id" 
                :class="'flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400 ' + className" /> -->
</template>

<script>

// export default {
//         props: ['id', 'name', 'value', 'className', 'type'],
// }

// export default {
//    inheritAttrs: false,
//    props: ['value'],
//    methods: {
//      input(e) {
//        this.$emit("input", e.target.value)
// //        console.log({e})
//      }
//   }
// }
</script>
