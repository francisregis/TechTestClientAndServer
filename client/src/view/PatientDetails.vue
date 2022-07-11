<template>
    <div>
        <h1>Patient Details</h1>
        <router-link :to="{ name: 'Home'}" >Go Back to Home</router-link>
        <form @submit="onSubmit" class="add-form">
          <div >
              <label>Name</label>
              <input type="text" v-model="patient.name" name="name" placeholder="Enter Patient Name"/>
          </div>
          <div >
              <label>Detail</label>
              <input type="text" v-model="patient.detail" name="detail" placeholder="Enter Patient Detail"/>
          </div>
          <div >
              <label>Mobile</label>
              <input type="text" v-model="patient.mobile" name="mobile" placeholder="Enter Patient Mobile"/>
          </div>
          <input type="submit" value="Update Patient Detail" />
      </form>
    </div>
</template>


<script>
  export default{
    name: 'PatientDetails', 
    props: ['id'],
    data() {
      return {
        patient: [],
      }
    },
    methods: {
      async getPatient(id){
      
        const res = await fetch(`http://127.0.0.1:8000/api/patients/${id}`, {
          method: 'GET',
        })

        const data = await res.json()
        return data;

      }, 
      async onSubmit(e){
          e.preventDefault()
          if(!this.patient.name){
              alert('Name is Required')
              return
          }

          const updatedPatient = {
              id:  this.id,
              name: this.patient.name,
              detail: this.patient.detail,
              mobile: this.patient.mobile,
          }

          const res = await fetch(`http://127.0.0.1:8000/api/patients/${this.id}`, {
            method: 'PUT',
            headers: {
              'Content-type': 'application/json',
            },
            body: JSON.stringify(updatedPatient)
          }).then(alert("successfully updated"))
          const data = await res.json(); 
      }
    },
    async created() {
      this.patient = await this.getPatient(this.id)
    }
    
  }

  
</script>