<template>
    <div>
        <div :key="patient.id" v-for="patient in patients">
            <Patient @delete-patient="$emit('delete-patient', patient.id)" :patient="patient"/>
        </div>
    </div>
</template>

<script>
import Patient from './Patient'

export default {
    name: 'Patients',
    props: {
      patients: Array,
    },
    components: {
        Patient
    }
    
}
</script>