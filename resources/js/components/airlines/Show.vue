<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Airline #{{ airline.id }}</h2>
                <h2>{{ airline.name }}</h2>
                <h2>{{ airline.code }}</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
     data(){
        return{
            airline: {
                id: '',
                name: '',
                code: '',
            }
        }
    },
    mounted(){
        this.getAirline()
    },
    methods:{
        getAirline(){
            axios.get(`/api/airline/${this.$route.params.id}`)
                .then(response => {
                    const { id, name, code } = response.data
                    this.airline.id = id
                    this.airline.name = name
                    this.airline.code = code
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
