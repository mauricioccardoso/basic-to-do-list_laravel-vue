<template>
  <main>
    <TaskForm @reloadTasks="loadTasks">
      <div class="content content-responsive">
        <TasksCard title="Tarefas Abertas">
          <TaskList
            :tasks="incompleteTasks"
            @reloadTasks="loadTasks"
            @loadingModal="openLoadingModal"
          />
        </TasksCard>
        <TasksCard title="Tarefas Concluídas" bgColor="#41cf6c">
          <TaskList
            :tasks="completeTasks"
            @reloadTasks="loadTasks"
            @loadingModal="openLoadingModal"
          />
        </TasksCard>
      </div>
    </TaskForm>
    <div class="spinner" v-if="loading">
      <div>
        <i class="fas fa-spinner fa-spin"></i>
        Carregando...
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import TaskForm from '@/components/TaskForm.vue'
import TasksCard from '@/components/TasksCard.vue'
import TaskList from '@/components/TaskList.vue'

import type { ITask } from '@/interfaces/ITask'

import httpClient from '../http'
import { onBeforeMount, ref } from 'vue'

let tasks: ITask[] = []
let incompleteTasks = ref<ITask[]>([])
let completeTasks = ref<ITask[]>([])
let loading = ref(false)

const getTaskList = async () => {
  return httpClient.get('/task').then(({ data }) => {
    return data
  })
}

const loadTasks = async () => {
  tasks = await getTaskList()

  incompleteTasks.value = tasks.filter((task) => task.status === false)
  completeTasks.value = tasks.filter((task) => task.status === true)
  loading.value = false
}

const openLoadingModal = () => {
  loading.value = true
}

onBeforeMount(() => {
  loadTasks()
})
</script>

<style scoped>
.content {
  display: flex;
  flex-direction: column;
  row-gap: 10px;

  margin: 1rem 0;
}

@media screen and (min-width: 600px) {
  .content-responsive {
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap: 20px;
  }
}

.spinner {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #0000003d;
  display: flex;
  justify-content: center;
  align-items: center;
}

.spinner div {
  background-color: white;
  border-radius: 12px;

  color: black;
  font-size: 1.25rem;

  padding: 2rem;
}
</style>
