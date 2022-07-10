<template>
    <form @submit="onSubmit" class="add-form">
        <div >
            <label>Name</label>
            <input type="text" v-model="name" name="name" placeholder="Enter Patient Name"/>
        </div>
        <div >
            <label>Detail</label>
            <input type="text" v-model="detail" name="detail" placeholder="Enter Patient Detail"/>
        </div>
        <div >
            <label>Mobile</label>
            <input type="text" v-model="mobile" name="mobile" placeholder="Enter Patient Mobile"/>
        </div>
        <input type="submit" value="Add Patient" />
    </form>
</template>

<script>
export default {
    name: 'AddPatient', 
    data() {
        return {
            name: '',
            detail: '',
            mobile: '',
        }
    },
    methods: {
        onSubmit(e){
            e.preventDefault()
            if(!this.name){
                alert('Name is Required')
                return
            }

            const newPatient = {
                name: this.name,
                detail: this.detail,
                mobile: this.mobile,
            }

            this.$emit('addPatient', newPatient);
        }
    }
}
</script>