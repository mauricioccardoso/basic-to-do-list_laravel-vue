<template>
  <div>
    <div class="main_card">
      <form class="form" @submit.prevent="saveTask">
        <input
          class="task_name"
          type="text"
          name="name"
          id="name"
          placeholder="O que faremos hoje?"
          v-model="name"
          required
        />
        <button class="btn__submit_task" :disabled="loading">
          <span v-if="!loading"> Adicionar Tarefa </span>
          <span v-else>
            <i class="fas fa-spinner fa-spin"></i>
            Carregando...
          </span>
        </button>
      </form>
      <slot></slot>
    </div>
  </div>
</template>

<script setup lang="ts">
import Swal from 'sweetalert2/dist/sweetalert2.js'

import httpClient from '@/http'
import { ref } from 'vue'

let loading = ref(false)
const name = ref('')

const emit = defineEmits(['reloadTasks'])

const saveTask = () => {
  loading.value = true

  httpClient
    .post('/task', { name: name.value })
    .then(() => {
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: 'Tarefa Salva',
        showConfirmButton: false,
        timer: 1500
      })
      name.value = ''
      emit('reloadTasks')
    })
    .catch(() => {
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: 'O nome da tarefa deve ter no minímo 3 caracteres',
        showConfirmButton: false,
        timer: 2000
      })
    })
    .finally(() => {
      loading.value = false
    })
}
</script>

<style scoped>
.main_card {
  box-shadow: 5px 5px 10px 5px #e4e4e4;
  border: 1px solid #e4e4e4a2;
  border-radius: 24px;

  max-width: 1024px;
  padding: 1rem 1rem;
}

.form {
  display: flex;
}

.task_name {
  margin-right: 1rem;
  padding: 0.5rem;

  flex-grow: 1;
}

.btn__submit_task {
  background-color: #007abcc0;
  border: 2px solid #1a759cc0;
  border-radius: 3px;

  font-weight: 600;
  text-transform: uppercase;

  padding: 0.5rem;
}

.btn__submit_task:hover {
  filter: brightness(0.8);
}
</style>
