<template>
  <form @submit.prevent="confirmDelete()">
    <button class="btn btn-danger">Excluir</button>
  </form>
</template>
<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
  props: ["url"],
  methods: {
    confirmDelete() {
      Swal.fire({
        title: "Você tem certeza que deseja excluir?",
        text: "Esta ação não pode ser desfeita",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, excluir"
      }).then(result => {
        if (result.value) {
          axios.delete(this.url).then(response => {
              window.location.reload()
          }).catch(()=>{
              window.location.reload()
          });
        }
      });
    }
  }
};
</script>