<template>
  <div class="overflow-hidden overflow-x-auto rounded-md dark:text-slate-200">
    <table class="inline-block min-w-full text-sm font-medium text-left">
      <thead class="bg-gray-300 dark:bg-slate-600">
        <tr>
          <slot name="header"></slot>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-300 dark:divide-slate-600">
        <slot name="body"></slot>
      </tbody>
    </table>
  </div>
</template>