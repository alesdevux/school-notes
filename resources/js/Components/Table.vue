<template>
  <div class="overflow-x-auto text-slate-200">
    <table class="inline-block min-w-full text-sm font-medium text-left">
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