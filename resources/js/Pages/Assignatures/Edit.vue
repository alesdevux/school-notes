<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import Button from '../../Components/Button.vue';
</script>

<template>
  <AppLayout title="Assignatures">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Edit assignature {{ name }}
      </h2>
    </template>

    <form method="POST" @submit.prevent="submit" class="md:mx-auto md:max-w-lg">

      <div class="flex flex-wrap mb-6 -mx-3">
        <div class="w-full px-3">
          <label class="block mb-2 text-xs font-bold tracking-wide text-gray-200 uppercase" for="name">
            Name
          </label>
          <input
            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
            id="name"
            name="name"
            type="text"
            v-model="name"
          />
        </div>
      </div>

      <div class="flex mb-6 -mx-3 lex-wrap">
        <div class="w-full px-3">
          <label class="block mb-2 text-xs font-bold tracking-wide text-gray-200 uppercase" for="description">
            Professor
          </label>
          <select v-model="professor_id" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
            <option v-for="professor in professors" :value="professor.id">{{ professor.second_name }}, {{ professor.name }}</option>
          </select>
        </div>
      </div>

      <div class="flex mb-6 -mx-3 lex-wrap">
        <div class="w-full px-3">
          <label class="block mb-2 text-xs font-bold tracking-wide text-gray-200 uppercase" for="description">
            Course
          </label>
          <select v-model="course" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
            <option v-for="course in optionsCourse" :value="course">{{ course }}</option>
          </select>
        </div>
      </div>

      <div class="flex flex-wrap mb-6 -mx-3">
        <div class="w-full px-3">
          <label class="block mb-2 text-xs font-bold tracking-wide text-gray-200 uppercase" for="description">
            Description
          </label>
          <textarea
            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
            id="description"
            name="description"
            v-model="description"
          ></textarea>
        </div>
      </div>

      <div class="flex justify-end">
        <Button type="submit">
          Save
        </Button>
      </div>
    </form>
  </AppLayout>
</template>

<script>
export default {
  props: [
    'assignature',
    'professors',
  ],
  data() {
    return {
      name: this.assignature.name,
      description: this.assignature.description,
      course: this.assignature.course,
      optionsCourse: ['1 ESO', '2 ESO', '3 ESO', '4 ESO', '1 BATX', '2 BATX'],
      professor_id: this.assignature.user_id,
      assignature: this.assignature,
      form: {
        name: this.assignature.name,
        course: this.assignature.course,
        user_id: this.professor_id,
        description: this.assignature.description,
      },
    };
  },
  methods: {
    submit() {
      Inertia.patch(route('assignatures.update', this.assignature.id), this.$data.form);
    },
  },
  watch: {
    name() {
      this.form.name = this.name;
    },
    description() {
      this.form.description = this.description;
    },
    course() {
      this.form.course = this.course;
    },
    professor_id() {
      this.form.user_id = this.professor_id;
    },
  },
}
</script>