<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LinkButton from '@/Components/LinkButton.vue';
import Table from '@/Components/Table.vue';
</script>

<template>
  <AppLayout title="Assignatures">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Index assignatures
      </h2>
      <LinkButton :href="route('assignatures.create')" v-if="$page.props.user.is_admin || $page.props.user.is_tutor || $page.props.user.is_professor">
        Create assignature
      </LinkButton>
    </template>

    <Table>
      <template #header>
        <th class="px-3 py-2"></th>
        <th class="px-3 py-2">Assignature</th>
        <th class="px-3 py-2">Professor</th>
        <th class="px-3 py-2">Course</th>
        <th class="px-3 py-2">Year</th>
        <th class="px-3 py-2">Description</th>
      </template>
      <template #body>
        <tr v-for="assignature in assignatures" :key="assignature">
          <td class="px-3 py-2">
            <a href="">edit</a>
          </td>
          <td class="px-3 py-2 bg-slate-700">{{ assignature.name }}</td>
          <td class="px-3 py-2 whitespace-nowrap">{{ assignature.user_id }}</td>
          <td class="px-3 py-2 text-center">{{ assignature.course }}</td>
          <td class="px-3 py-2 text-center">{{ assignature.year }}</td>
          <td class="px-3 py-2 whitespace-nowrap">{{ assignature.description }}</td>
        </tr>
      </template>
    </Table>
  </AppLayout>
</template>

<script>
export default {
  props: ['assignatures'],
}
</script>