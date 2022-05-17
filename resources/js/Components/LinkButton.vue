<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <Link :href="href" :class="mergeClasses">
  <slot />
  </Link>
</template>

<script>
export default {
  props: {
    href: {
      type: String,
      required: true,
    },
    status: {
      type: String,
      default: 'principal',
    },
    class: {
      type: String,
      default: '',
    },
  },
  computed: {
    classes() {
      return this.status === 'principal'
        ? 'bg-primary-500 hover:bg-primary-700'
        : 'bg-gray-500 hover:bg-gray-700';
    },
    mergeClasses() {
      return `flex px-6 py-2 font-bold rounded-md w-fit ${this.class} ${this.classes}`;
    },
  },
};
</script>