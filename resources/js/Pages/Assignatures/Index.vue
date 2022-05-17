<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Table from '@/Components/Table.vue';
</script>

<template>
  <AppLayout title="Assignatures">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Index assignatures
      </h2>
    </template>

    <Table>
      <template #header>
        <th class="px-3 py-2"></th>
        <th class="px-3 py-2">Assignature</th>
        <th class="px-3 py-2">Students</th>
        <th class="px-3 py-2">Description</th>
      </template>
      <template #body>
        <tr>
          <td class="px-3 py-2">
            <a href="">edit</a>
          </td>
          <td class="px-3 py-2 bg-slate-700">Maths</td>
          <td class="px-3 py-2">23</td>
          <td class="px-3 py-2 whitespace-nowrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere labore laborum rem quia dolore odit veniam perspiciatis.</td>
        </tr>
        <tr>
          <td class="px-3 py-2">
            <a href="">edit</a>
          </td>
          <td class="px-3 py-2 bg-slate-700">Biology</td>
          <td class="px-3 py-2">23</td>
          <td class="px-3 py-2 whitespace-nowrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, quisquam amet! Voluptates.</td>
        </tr>
      </template>
    </Table>
  </AppLayout>
</template>