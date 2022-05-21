<template>
  <div class="flex flex-wrap mb-6 -mx-3">
    <div class="w-full px-3">
      <label class="block mb-2 text-xs font-bold tracking-wide uppercase dark:text-gray-200" :for="name">
        {{ label }}
      </label>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      required: true,
    },
    label: String,
  },
  computed: {
    label() {
      return this.label || this.name;
    },
  },
}
</script>