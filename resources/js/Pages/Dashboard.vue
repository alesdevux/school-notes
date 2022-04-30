<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Dashboard {{ user.role }}
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
          <Welcome />
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>

export default {
  data() {
    return {
      user: {
        admin: this.$page.props.user.is_admin,
        tutor: this.$page.props.user.is_tutor,
        professor: this.$page.props.user.is_professor,
        student: !this.$page.props.user.is_admin && !this.$page.props.user.is_tutor && !this.$page.props.user.is_professor,
        role: this.$page.props.user.is_admin ? 'Admin' : this.$page.props.user.is_tutor ? 'Tutor' : this.$page.props.user.is_professor ? 'Professor' : 'Student',
      },
    };
  },
};

</script>