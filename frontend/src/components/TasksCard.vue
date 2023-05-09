<template>
  <div class="tasks_card">
    <h3 class="tasks_card-title" :style="{ backgroundColor: bgColor }">{{ title }}</h3>
    <hr />
    <div class="content">
      <slot></slot>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps({
  title: {
    type: String,
    required: true
  },
  bgColor: {
    type: String,
    default: '#dad9d9'
  }
})
</script>

<style scoped>
.tasks_card {
  border: 1px solid #7e7e7e;
  border-radius: 12px;

  overflow: hidden;
}

.tasks_card-title {
  padding: 0.5rem;

  text-transform: uppercase;
  text-align: center;
}

.content {
  padding: 0.5rem 0.5rem;
}
</style>
