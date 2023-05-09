<template>
  <div class="content_item">
    <h4 class="name">{{ name }}</h4>
    <div class="action">
      <button v-if="!status" @click="taskAction('check')">
        <i class="fa-solid fa-square-check fa-2xl"></i>
      </button>
      <button v-else @click="taskAction('uncheck')">
        <i class="fa-solid fa-square-xmark fa-2xl"></i>
      </button>
      <button @click="taskAction('edit')">
        <i class="fa-solid fa-square-pen fa-2xl"></i>
      </button>
      <button @click="taskAction('delete')">
        <i class="fa-solid fa-square-minus fa-2xl"></i>
      </button>
    </div>
  </div>

  <CardModal
    v-if="modalOpen"
    :title="title"
    :btnActionName="btnActionName"
    :bgColor="bgColor"
    :taskName="taskName ? name : ''"
    @closeModal="closeModal"
    @confirmAction="confirmAction"
  />
</template>

<script setup lang="ts">
import Swal from 'sweetalert2/dist/sweetalert2.js'

import { ref } from 'vue'
import CardModal from './CardModal.vue'
import httpClient from '@/http'

const props = defineProps({
  id: {
    type: Number,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  status: {
    type: Boolean,
    required: true,
    default: false
  }
})

const emit = defineEmits(['reloadTasks', 'loadingModal'])

let taskName: Boolean = false
let modalOpen = ref(false)
let title = ref('')
let btnActionName = ref('')
let bgColor = ref('')
let actionSelected = ''

const taskAction = (action: string) => {
  actionSelected = action
  if (action === 'check') {
    title.value = 'Concluir Tarefa?'
    btnActionName.value = 'Concluir'
    bgColor.value = '#41cf6c'
  }

  if (action === 'uncheck') {
    title.value = 'Abrir Tarefa?'
    btnActionName.value = 'Confirmar'
    bgColor.value = '#41cf6c'
  }

  if (action === 'edit') {
    taskName = true
    title.value = 'Editar Tarefa?'
    btnActionName.value = 'Salvar'
    bgColor.value = '#41cf6c'
  }

  if (action === 'delete') {
    title.value = 'Excluir Tarefa?'
    btnActionName.value = 'Excluir'
    bgColor.value = '#ff0000'
  }

  modalOpen.value = true
}

const closeModal = () => {
  modalOpen.value = false
  actionSelected = ''
  taskName = false
}

const confirmAction = async (editedName: string) => {
  modalOpen.value = false
  emit('loadingModal')

  if (actionSelected === 'check' || actionSelected === 'uncheck') {
    await httpClient
      .put(`/task/${props.id}`, { name: props.name, status: !props.status })
      .then(() => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: `${actionSelected === 'check' ? 'Tarefa Concluída' : 'Tarefa Aberta'}`,
          showConfirmButton: false,
          timer: 1500
        })
      })
      .catch(() => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error',
          title: `${
            actionSelected === 'check' ? 'Error ao concluir tarefa' : 'Error ao abrir tarefa'
          }`,
          showConfirmButton: false,
          timer: 1500
        })
      })
  }

  if (actionSelected === 'edit') {
    await httpClient
      .put(`/task/${props.id}`, { name: editedName, status: props.status })
      .then(() => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'Tarefa atualizada com sucesso',
          showConfirmButton: false,
          timer: 1500
        })
      })
      .catch(() => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error',
          title: 'Error ao atualizar tarefa',
          showConfirmButton: false,
          timer: 1500
        })
      })
  }

  if (actionSelected === 'delete') {
    await httpClient
      .delete(`/task/${props.id}`)
      .then(() => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'Tarefa excluída com sucesso',
          showConfirmButton: false,
          timer: 1500
        })
      })
      .catch(() => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error',
          title: 'Error ao excluir tarefa',
          showConfirmButton: false,
          timer: 1500
        })
      })
  }

  setTimeout(() => {
    actionSelected = ''
    taskName = false
    emit('reloadTasks')
  }, 1400)
}
</script>

<style scoped>
.content_item {
  display: grid;
  grid-template-columns: 2fr 1fr;
  column-gap: 0.5rem;

  padding: 0.5rem;
  text-align: left;
}

.action {
  display: flex;

  column-gap: 0.5rem;
  align-self: center;
  justify-self: center;
}

.action button {
  border: none;
}

.fa-square-check {
  color: #008000;
}

.fa-square-xmark {
  color: #808080;
}

.fa-square-pen {
  color: #0000ff;
}

.fa-square-minus {
  color: #ff0000;
}

.fa-solid:hover {
  filter: brightness(0.7);
}
</style>
