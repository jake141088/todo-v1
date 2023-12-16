import axios from "axios";
import { baseURL, tarefaEditada, getTarefas } from "./App.vue";

const editarTarefa = async () => {
try {
// Lógica para editar a tarefa aqui (usando axios, por exemplo)
await axios.put(baseURL + `/api/tarefas/${tarefaEditada.value.id}`, tarefaEditada.value);

// Atualizar a lista de tarefas após editar
await getTarefas();
}
finally {
}
};
