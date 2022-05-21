<template>
  <button :class="mergeClasses">
    <slot>Button</slot>
  </button>
</template>

<script>
export default {
  props: {
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
      return `flex px-6 py-2 text-white font-bold rounded-md w-fit ${this.class} ${this.classes}`;
    },
  },
};
</script>