<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import Button from '../../Components/Button.vue';
import Label from '../../Components/Label.vue';
</script>

<template>
  <AppLayout title="Assignatures">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Edit assignature {{ name }}
      </h2>
    </template>

    <form method="POST" @submit.prevent="submit" class="md:mx-auto md:max-w-lg">
      <Label name="name" label="assignature">
        <input v-model="name" name="name" type="text" />
      </Label>

      <Label v-if="$page.props.user.is_admin" name="professor">
        <select v-model="professor_id" name="professor">
          <option v-for="professor in professors" :value="professor.id">{{ professor.second_name }}, {{ professor.name }}</option>
        </select>
      </Label>

      <Label name="course">
        <select v-model="course" name="course">
          <option v-for="course in optionsCourse" :value="course">{{ course }}</option>
        </select>
      </Label>

      <Label name="description">
        <textarea v-model="description" name="description" type="text"></textarea>
      </Label>

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