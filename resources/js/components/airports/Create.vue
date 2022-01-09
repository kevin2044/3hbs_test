<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form @submit.prevent="create">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="airport.name">
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" v-model="airport.code">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" v-model="airport.city">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            airport: {
                name: '',
                code: '',
                city: '',
            }
        }
    },
    methods:{
        create(){
            axios.post('/api/airport', this.airport)
                .then(response => {
                    this.$router.push({name: 'airport'})
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style>

</style>
