<template>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="state">Estado</label>
      <select v-model="state" class="form-control" name="state" required>
        <option
          v-for="(state, index) in states"
          :key="index"
          :value="state.id_estado"
        >{{state.nom_estado}}</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="city">Cidade</label>
      <select :disabled="!state" class="form-control" name="city" required>
        <option
          v-for="(city, index) in filteredCities"
          :key="index"
          :value="city.nom_cidade"
        >{{city.nom_cidade}}</option>
      </select>
      <span v-if="!state">Selecione um estado*</span>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  props: ["urlStates", "urlCities"],
  data() {
    return {
      states: [],
      state: null,
      cities: [],
      city: null,
    };
  },
  mounted() {
    axios.get(this.urlStates).then(response => {
      this.states = response.data;
    });
    axios.get(this.urlCities).then(response => {
      this.cities = response.data;
    });
  },
  computed: {
      filteredCities() {
          return this.cities.filter(item => item.id_estado == this.state);
      }
  }
};
</script>