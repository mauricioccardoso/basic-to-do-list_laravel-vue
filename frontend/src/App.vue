<script setup lang="ts">
import TaskView from '@/views/TaskView.vue'
import NavbarHeader from '@/components/NavbarHeader.vue'
</script>

<template>
  <NavbarHeader />
  <div class="container">
    <TaskView />
  </div>
</template>

<style scoped>
.container {
  padding: 1rem 1.25rem;
  max-width: 1024px;
  margin: auto;
}
</style>
