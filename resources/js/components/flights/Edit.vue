<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form @submit.prevent="update">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" v-model="flight.code">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" v-model="flight.type">
                            <option value="" selected disabled>Select Option</option>
                            <option>PASSENGER</option>
                            <option>FREIGHT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="departure_time">Departure Time</label>
                        <input type="datetime-local" class="form-control" id="departure_time" v-model="flight.departure_time">
                    </div>
                    <div class="form-group">
                        <label for="arrival_time">Arrival Time</label>
                        <input type="datetime-local" class="form-control" id="arrival_time" v-model="flight.arrival_time">
                    </div>
                    <div class="form-group">
                        <label for="departure_id">Departure</label>
                        <select class="form-control" id="departure_id" v-model="flight.departure_id">
                            <option value="" selected disabled>Select Option</option>
                            <option v-for="airport in airports" :key="airport.id" :value="airport.id">{{ airport.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destination_id">Destination</label>
                        <select class="form-control" id="destination_id" v-model="flight.destination_id">
                            <option value="" selected disabled>Select Option</option>
                            <option v-for="airport in airports" :key="airport.id" :value="airport.id">{{ airport.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="airline_id">Airlines</label>
                        <select class="form-control" id="airline_id" v-model="flight.airline_id">
                            <option value="" selected disabled>Select Option</option>
                            <option v-for="airline in airlines" :key="airline.id" :value="airline.id">{{ airline.name }}</option>
                        </select>
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
            flight: {
                code: '',
                type: '',
                departure_time: '',
                arrival_time: '',
                departure_id: '',
                destination_id: '',
                airline_id: '',
            },
            airports: [],
            airlines: [],
        }
    },
    mounted(){
        this.getAirports()
        this.getAirlines()
        this.getFlight()
    },
    methods:{
        update(){
            axios.put(`/api/flight/${this.$route.params.id}`, this.flight)
                .then(response => {
                    this.$router.push({name: 'flight'})
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getFlight(){
            axios.get(`/api/flight/${this.$route.params.id}`)
                .then(response => {
                    //console.log(response.data)
                    const {
                        code,
                        type,
                        departure_time,
                        arrival_time, airline, departure, destination } = response.data
                    this.flight.code = code
                    this.flight.type = type
                    this.flight.departure_time = departure_time.substring(0, departure_time.length - 8)
                    this.flight.arrival_time = arrival_time.substring(0, departure_time.length - 8)
                    this.flight.departure_id = departure.id
                    this.flight.destination_id = destination.id
                    this.flight.airline_id = airline.id
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getAirports(){
            axios.get('/api/airport', this.airport)
                .then(response => {
                    this.airports = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getAirlines(){
            axios.get('/api/airline', this.airport)
                .then(response => {
                    this.airlines = response.data
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
