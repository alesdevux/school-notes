<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  active: Boolean,
  href: String,
  as: String,
});

const classes = computed(() => {
  return props.active
    ? 'block pl-3 pr-4 py-2 border-l-4 border-secondary-400 text-base font-medium text-secondary-700 bg-secondary-50 focus:outline-none focus:text-secondary-800 focus:bg-secondary-100 focus:border-secondary-700 transition'
    : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
});
</script>

<template>
  <div>
    <button v-if="as == 'button'" :class="classes" class="w-full text-left">
      <slot />
    </button>

    <Link v-else :href="href" :class="classes">
    <slot />
    </Link>
  </div>
</template>
