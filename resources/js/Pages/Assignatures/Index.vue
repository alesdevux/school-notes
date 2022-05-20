<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LinkButton from '@/Components/LinkButton.vue';
import Table from '@/Components/Table.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <AppLayout title="Assignatures">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Index assignatures
      </h2>
      <LinkButton :href="route('assignatures.create')" v-if="isAdmin || isTutor || isProfessor">
        Create assignature
      </LinkButton>
    </template>
    
    <Table v-if="assignatures.length !== 0">
      <template #header>
        <th class="px-3 py-2" v-if="isProfessor || isAdmin"></th>
        <th class="px-3 py-2">Assignature</th>
        <th class="px-3 py-2" v-if="!isProfessor">Professor</th>
        <th class="px-3 py-2" v-if="isAdmin || isProfessor">Course</th>
        <th class="px-3 py-2">Year</th>
        <th class="px-3 py-2">Description</th>
      </template>
      <template #body>
        <tr v-for="assignature in assignatures" :key="assignature">
          <td class="px-3 py-2" v-if="isProfessor || isAdmin">
            <Link :href="route('assignatures.edit', { id: assignature.id })">
              edit
            </Link>
          </td>
          <td class="px-3 py-2 bg-slate-700">{{ assignature.name }}</td>
          <td class="px-3 py-2 whitespace-nowrap" v-if="!isProfessor">{{ assignature.user.second_name }}, {{ assignature.user.name }}</td>
          <td class="px-3 py-2 text-center" v-if="isAdmin || isProfessor">{{ assignature.course }}</td>
          <td class="px-3 py-2 text-center">{{ assignature.year }}</td>
          <td class="px-3 py-2 whitespace-nowrap">{{ assignature.description }}</td>
        </tr>
      </template>
    </Table>
    <p v-else>You don't have assignatures assigned</p>
  </AppLayout>
</template>

<script>
export default {
  props: [
    'assignatures',
    'isAdmin',
    'isProfessor',
    'isTutor',
    'isStudent'
  ],
}
</script>