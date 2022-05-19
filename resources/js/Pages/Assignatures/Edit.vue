<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout title="Assignatures">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Edit assignature {{ assignature.name }}
      </h2>
    </template>

    <p>
      Hi, configure edit assignature view
    </p>
  </AppLayout>
</template>

<script>
export default {
  props: [
    'assignature',
  ],
}
</script>