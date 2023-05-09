<template>
  <div v-for="(task, index) in tasks" :key="task.id">
    <TaskItem
      :id="task.id"
      :name="task.name"
      :status="task.status"
      @reloadTasks="$emit('reloadTasks')"
      @loadingModal="$emit('loadingModal')"
    />
    <hr v-if="index < tasks.length - 1" />
  </div>
</template>

<script setup lang="ts">
import TaskItem from './TaskItem.vue'

import type { ITask } from '@/interfaces/ITask'

import type { PropType } from 'vue'

defineProps({
  tasks: {
    type: Object as PropType<ITask[]>,
    required: true
  }
})
defineEmits(['reloadTasks', 'loadingModal'])
</script>
