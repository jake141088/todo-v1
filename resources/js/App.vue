<template>
  <div class="container mt-5 border p-4">
    <div>
      <!-- Formulário para cadastrar novas tarefas -->
      <div class="mb-4 text-end">
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
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                @click="fecharModal"></button>
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
                  <select id="modal-status" v-model="novaTarefa.status" class="form-select" required>
                    <option value="pendente">Pendente</option>
                    <option value="concluido">Concluído</option>
                    <option value="abandonado">Abandonado</option>
                  </select>
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

    <!-- Modal para editar tarefa -->
    <div class="modal fade" id="modalEditarTarefa" tabindex="-1" aria-labelledby="modalEditarTarefaLabel" aria-hidden="true"
      ref="modalEditarTarefa">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditarTarefaLabel">Editar Tarefa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
              @click="fecharModalEditar"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="modal-texto-editar" class="form-label">Texto:</label>
                <input type="text" id="modal-texto-editar" v-model="tarefaEditada.texto" class="form-control" required />
              </div>
              <div class="col-md-4">
                <label for="modal-autor-editar" class="form-label">Autor:</label>
                <input type="text" id="modal-autor-editar" v-model="tarefaEditada.autor" class="form-control" required />
              </div>
              <div class="col-md-4">
                <label for="modal-status-editar" class="form-label">Status:</label>
                <select id="modal-status-editar" v-model="tarefaEditada.status" class="form-select" required>
                  <option value="pendente">Pendente</option>
                  <option value="concluido">Concluído</option>
                  <option value="abandonado">Abandonado</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="limparCampos">Limpar Campos</button>
            <button type="button" class="btn btn-primary" @click="salvarEdicoesTarefa">Salvar Edições</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabela de Tarefas -->
    <div class="table-responsive">
      <table v-if="tarefas.length >= 1" class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Texto</th>
            <th scope="col">Autor</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Ação</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tarefa in tarefas" :key="tarefa.id">
            <td>{{ tarefa.id }}</td>
            <td>{{ tarefa.texto }}</td>
            <td>{{ tarefa.autor }}</td>
            <td>{{ tarefa.status }}</td>
            <td class="text-center">
              <button @click="abrirModalEditar(tarefa)" class="btn btn-success btn-sm editar-btn">
                <i class="bi bi-pencil"></i> <!-- Ícone de lápis para editar -->
              </button>
              <button @click="removerTarefa(tarefa.id)" class="btn btn-primary btn-sm remover-btn">
                <i class="bi bi-trash"></i> <!-- Ícone de lixeira para remover -->
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-else>
        <p>Carregando...</p>
      </div>

    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import http from "./axios"

const novaTarefa = ref({ autor: "", texto: "", status: "" });
const modalAdicionarTarefa = ref(null);
const modalEditarTarefa = ref(null);
const tarefas = ref([]); // Adicionando a propriedade tarefas
const tarefaEditada = ref({}); // Adicionando a propriedade tarefaEditada

//Funçoes do sisteminha
const abrirModal = () => {
  // Limpar os campos do formulário ao abrir a modal
  novaTarefa.value = { autor: "", texto: "", status: "" };
  // Mostrar a modal de adicionar tarefa
  const modal = new bootstrap.Modal(modalAdicionarTarefa.value);
  modal.show();
};

const fecharModal = () => {
  // Esconder a modal de adicionar tarefa
  const modalDiv = document.getElementById("modalAdicionarTarefa");
  const modal = bootstrap.Modal.getInstance(modalDiv);
  if (modal) {
    modal.hide();
  }
};

const fecharModalEditar = () => {
  // Esconder a modal de editar tarefa
  const modalDiv = document.getElementById("modalEditarTarefa");
  const modal = bootstrap.Modal.getInstance(modalDiv);
  if (modal) {
    modal.hide();
  }
};

function abrirModalEditar(tarefa) {
// Preencher a propriedade tarefaEditada com os valores da tarefa selecionada
tarefaEditada.value = { ...tarefa };
const modal = new bootstrap.Modal(modalEditarTarefa.value);
modal.show();
}

const adicionarTarefa = async () => {
  try {
    // Lógica para adicionar a tarefa aqui (usando axios, por exemplo)
    const response = await http.post("/api/tarefas", novaTarefa.value);

    // Adicionar a nova tarefa diretamente no array tarefas
    tarefas.value.push(response.data);

    // Fechar a modal após adicionar a tarefa
    fecharModal();
  } catch (error) {
    console.error("Erro ao adicionar tarefa:", error);
  }
};

const removerTarefa = async (tarefaId) => {
  try {
    // Lógica para remover a tarefa aqui (usando axios, por exemplo)
    await http.delete(`/api/tarefas/${tarefaId}`);

    // Atualizar a lista de tarefas após remover
    await getTarefas();
  } catch (error) {
    console.error("Erro ao remover tarefa:", error);
  }
};

const salvarEdicoesTarefa = async () => {
  try {
    // Lógica para editar a tarefa aqui (usando axios, por exemplo)
    await http.put(`/api/tarefas/${tarefaEditada.value.id}`, tarefaEditada.value);

    // Atualizar a lista de tarefas após editar
    await getTarefas();

    // Fechar a modal após editar a tarefa
    fecharModalEditar();

  } catch (error) {
    console.error("Erro ao editar tarefa:", error);
  }
};

const limparCampos = () => {
  // Limpar os campos da tarefaEditada
  tarefaEditada.value = { texto: "", autor: "", status: "" };
};

const getTarefas = async () => {
  try {
    const response = await http.get("/api/tarefas");
    tarefas.value = response.data;
  } catch (error) {
    console.error("Erro ao obter tarefas:", error);
  }
};

//Montar as coisas
onMounted(async () => {
  await getTarefas()
});


</script> 