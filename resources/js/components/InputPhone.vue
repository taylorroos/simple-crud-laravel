
<template>
  <input
    type="text"
    :name="name"
    class="form-control"
    :id="name"
    v-model="inputModel"
    v-mask="mask"
    :required="required"
  >
</template>

<script>
export default {
  props: ["name", "value", "required"],
  data: () => {
    return {
      inputModel: ""
    };
  },
  mounted() {
    this.inputModel = this.value;
  },
  computed: {
    mask() {
      if (this.inputModel && this.inputModel.length == 14) {
        return "(##) ####-####";
      }
      return "(##) #####-####";
    }
  }
};
</script>
