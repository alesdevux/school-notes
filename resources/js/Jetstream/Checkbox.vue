<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
  checked: {
    type: [Array, Boolean],
    default: false,
  },
  value: {
    type: String,
    default: null,
  },
});

const proxyChecked = computed({
  get() {
    return props.checked;
  },

  set(val) {
    emit('update:checked', val);
  },
});
</script>


<template>
  <input v-model="proxyChecked" type="checkbox" :value="value"
    class="border-gray-300 rounded shadow-sm text-secondary-600 focus:border-secondary-300 focus:ring focus:ring-secondary-200 focus:ring-opacity-50">
</template>
