<template>
  <div>
    <Header title="Patient Lists" />
    <AddPatient @add-patient="addPatient" />
    <Patients @delete-patient="deletePatient" :patients="patients" />
  </div>
</template>

<script>
import Header from './components/Header'
import Patients from './components/Patients'
import AddPatient from './components/AddPatient'

export default {
  name: 'App',
  components: {
    Header,
    Patients,
    AddPatient
  },
  data() {
    return {
      patients: []
    }
  },
  methods:{
    async fetchPatients() {
      const res = await fetch('http://127.0.0.1:8000/api/patients')
      const data = await res.json()
      return data;
    },

    async addPatient(patient){
      const res = await fetch("http://127.0.0.1:8000/api/patients", {
        method: 'POST',
        headers: {
          'Content-type': 'application/json',
        },
        body: JSON.stringify(patient)
      })
      const data = await res.json();

      this.patients = [...this.patients, data]
    },

    async deletePatient(id){
      
      const res = await fetch(`http://127.0.0.1:8000/api/patients/${id}`, {
        method: 'DELETE',
      
      })

      res.status == 200 ? (this.patients = this.patients.filter((patient)=> patient.id !== id)) : alert('unable to delete patient record')
    }
  },
  async created() {
    this.patients = await this.fetchPatients()
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
