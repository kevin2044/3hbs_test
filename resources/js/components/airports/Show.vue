<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Airport #{{ airport.id }}</h2>
                <h2>{{ airport.name }}</h2>
                <h2>{{ airport.code }}</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
     data(){
        return{
            airport: {
                id: '',
                name: '',
                code: '',
            }
        }
    },
    mounted(){
        this.getAirport()
    },
    methods:{
        getAirport(){
            axios.get(`/api/airport/${this.$route.params.id}`)
                .then(response => {
                    const { id, name, code } = response.data
                    this.airport.id = id
                    this.airport.name = name
                    this.airport.code = code
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
