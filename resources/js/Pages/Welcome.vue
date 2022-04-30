<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import LinkButton from '../Components/LinkButton.vue';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});
</script>

<template>

  <Head title="Welcome" />

  <div class="relative flex justify-center min-h-screen bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0 font-pop">
    <div v-if="canLogin" class="fixed top-0 right-0 px-6 py-4">
      <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
      Dashboard
      </Link>

      <template v-else>
        <Link :href="route('login')" class="text-sm text-gray-700 underline">
        Log in
        </Link>

        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
        Register
        </Link>
      </template>
    </div>

    <div class="max-w-6xl pt-16 mx-auto dark:text-white sm:px-6 lg:px-8">
      <h1 class="mb-12 text-4xl font-black underline uppercase decoration-primary-500 underline-offset-8">
        School Notes
      </h1>
      <div v-if="canLogin">
        <p v-if="$page.props.user">Hi <span class="font-bold text-primary-500">{{ $page.props.user.name }}</span>!</p>
        <p class="text-lg">
          Welcome to School Notes, a simple, open-source notes app for school.
        </p>
        <LinkButton v-if="$page.props.user" :href="route('dashboard')" class="ml-auto">
          Go to Dashboard
        </LinkButton>
        <LinkButton v-if="!$page.props.user" :href="route('login')" class="ml-auto">
          Log in
        </LinkButton>
      </div>
    </div>
  </div>
</template>
