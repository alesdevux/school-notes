<template>
  <div class="overflow-x-auto text-slate-200">
    <table class="py-2 inline-block min-w-full lg:px-8 text-sm font-medium px-6 text-left">
      <thead class="bg-slate-600">
        <tr>
          <slot name="header"></slot>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-600">
        <slot name="body"></slot>
      </tbody>
    </table>
  </div>
</template>