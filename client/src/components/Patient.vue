<template>
    <div class="patient">
        <h3>{{patient.name}}</h3>
        <p>{{patient.detail}}</p>
        <p>{{patient.mobile}}</p>
        <button @click="onDelete(patient.id)">delete</button>
        <router-link :to="{ name: 'PatientDetails', params: {id: patient.id}}" >Edit</router-link>
    </div>
</template>

<script>
export default {
    name: 'Patient', 
    props: {
        patient: Object,
    },
    methods: {
        onDelete(id){
            this.$emit('delete-patient', id)
        }
    }
}
</script>

<style scope>
.patient {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
</style>