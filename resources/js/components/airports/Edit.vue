<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form @submit.prevent="update">
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
    mounted(){
        this.getAirport()
    },
    methods:{
        update(){
            axios.put(`/api/airport/${this.$route.params.id}`, this.airport)
                .then(response => {
                    this.$router.push({name: 'airport'})
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getAirport(){
            axios.get(`/api/airport/${this.$route.params.id}`)
                .then(response => {
                    const { name, code, city } = response.data
                    this.airport.name = name
                    this.airport.code = code
                    this.airport.city = city
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
