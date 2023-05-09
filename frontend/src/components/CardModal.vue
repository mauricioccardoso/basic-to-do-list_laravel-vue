<template>
  <div class="modal">
    <div class="modal-content">
      <h2 class="title">{{ title }}</h2>
      <hr />
      <div v-if="taskName" class="edit_name-container">
        <input class="edit_name" type="text" v-model="editedName" />
      </div>
      <div class="btns">
        <button class="btn btn_cancel" @click="$emit('closeModal')">Cancelar</button>
        <button
          class="btn"
          :style="{ background: bgColor }"
          @click="$emit('confirmAction', taskName ? editedName : null)"
        >
          {{ btnActionName }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  taskName: {
    type: String
  },
  btnActionName: {
    type: String,
    required: true
  },
  bgColor: {
    type: String,
    required: true
  }
})

defineEmits(['closeModal', 'confirmAction'])

const editedName = ref(props.taskName)
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #00000080;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;

  width: 500px;
  margin: 1rem;
}

.title {
  text-transform: uppercase;
}

.btns {
  margin-top: 1rem;
  display: flex;
  justify-content: space-around;
}

.btn {
  border-radius: 3px;
  border: 1px solid #000000;

  font-weight: 600;
  text-transform: uppercase;

  padding: 0.5rem;
}

.btn:hover {
  filter: brightness(0.8);
}

.btn_cancel {
  background-color: #d3d3d3;
}

.edit_name-container {
  display: flex;
  margin: 1rem 1rem;
}

.edit_name {
  padding: 0.5rem;

  flex-grow: 1;
}
</style>
