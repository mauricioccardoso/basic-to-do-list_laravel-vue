<template>
  <header class="header">
    <nav class="navbar">
      <img
        class="logo"
        src="/images/inbraep-full_logo_2.png"
        alt="Logotipo da inbraep"
      />
      <h1>Lista de Tarefa</h1>
    </nav>
  </header>
</template>

<script setup lang="ts"></script>

<style scoped>
.header {
  background-color: #007abc34;
}
.navbar {
  max-width: 1024px;
  margin: auto;
  padding: 0 0.75rem;

  display: flex;
  align-items: center;
}

.logo {
  padding: 10px;
  width: 100px;
  margin-right: 2rem;
}
</style>
