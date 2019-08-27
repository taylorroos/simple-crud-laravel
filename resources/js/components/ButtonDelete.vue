<template>
  <form @submit.prevent="confirmDelete()">
    <button :disabled="inprogress" class="btn btn-danger">{{btnText}}</button>
  </form>
</template>
<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
  props: ["url"],
  data() {
    return {
      inprogress: false,
      btnText: 'Excluir'
    }
  },
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
          this.inprogress = true;
          this.btnText = 'Excluindo...';
          axios.delete(this.url).then(response => {
              window.location.reload()
              this.inprogress = false;
              this.btnText = 'Excluir';
          }).catch(()=>{
              window.location.reload()
              this.inprogress = false;
              this.btnText = 'Excluir';

          });
        }
      });
    }
  }
};
</script>