<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Flight #{{ flight.id }}</h2>
                <h2>{{ flight.code }}</h2>
                <h2>{{ flight.type }}</h2>
                <h2>{{ flight.departure_time }}</h2>
                <h2>{{ flight.arrival_time }}</h2>
                <h2>{{ flight.departure_id }}</h2>
                <h2>{{ flight.destination_id }}</h2>
                <h2>{{ flight.airline_id }}</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
     data(){
        return{
            flight: {
                id: '',
                code: '',
                type: '',
                departure_time: '',
                arrival_time: '',
                departure_id: '',
                destination_id: '',
                airline_id: '',
            }
        }
    },
    mounted(){
        this.getflight()
    },
    methods:{
        getflight(){
            axios.get(`/api/flight/${this.$route.params.id}`)
                .then(response => {
                    console.log(response.data)
                    const { id,
                        code,
                        type,
                        departure_time,
                        arrival_time, airline, departure, destination} = response.data
                    //console.log(airline)
                    this.flight.id = id
                    this.flight.code = code
                    this.flight.type = type
                    this.flight.departure_time = departure_time
                    this.flight.arrival_time = arrival_time
                    this.flight.departure_id = departure.name
                    this.flight.destination_id = destination.name
                    this.flight.airline_id = airline.name
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
