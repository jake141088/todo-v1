<template>
  <div>
    <!-- Formulário para cadastrar novas tarefas -->
    <div class="mb-4">
      <div class="row g-3">
        <div class="col-12 mt-3">
          <button @click="abrirModal" class="btn btn-primary">Nova Tarefa</button>
        </div>
      </div>
    </div>

    <!-- Modal para adicionar tarefa -->
    <div class="modal fade" id="modalAdicionarTarefa" tabindex="-1" aria-labelledby="modalAdicionarTarefaLabel"
      aria-hidden="true" ref="modalAdicionarTarefa">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAdicionarTarefaLabel">Adicionar Nova Tarefa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="fecharModal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="modal-texto" class="form-label">Texto:</label>
                <input type="text" id="modal-texto" v-model="novaTarefa.texto" class="form-control" required />
              </div>
              <div class="col-md-4">
                <label for="modal-autor" class="form-label">Autor:</label>
                <input type="text" id="modal-autor" v-model="novaTarefa.autor" class="form-control" required />
              </div>
              <div class="col-md-4">
                <label for="modal-status" class="form-label">Status:</label>
                <input type="text" id="modal-status" v-model="novaTarefa.status" class="form-control" required />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="fecharModal">Fechar</button>
            <button type="button" class="btn btn-primary" @click="adicionarTarefa">Adicionar Tarefa</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { ref, onMounted } from 'vue';

const baseURL = "http://localhost:8086";

const novaTarefa = ref({ autor: "", texto: "", status: "" });
const modalAdicionarTarefa = ref(null);

const abrirModal = () => {
  // Limpar os campos do formulário ao abrir a modal
  novaTarefa.value = { autor: "", texto: "", status: "" };
  // Mostrar a modal
  const modal = new bootstrap.Modal(modalAdicionarTarefa.value);
  modal.show();
};

const fecharModal = () => {
  // Esconder a modal
  const modal = new bootstrap.Modal(modalAdicionarTarefa.value);
  modal.hide();
};

const adicionarTarefa = async () => {
  // Lógica para adicionar a tarefa aqui (usando axios, por exemplo)
  // ...

  // Fechar a modal após adicionar a tarefa
  fecharModal();
};

const getTarefa = async () => {
  return await axios.get(baseURL + "/api/tarefas").then((response) => {
    console.log(response.data);
    // tarefas.value = response.data;
  });
};
</script>

