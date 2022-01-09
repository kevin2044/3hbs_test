<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <router-link :to="{ name: 'flightCreate' }" class="btn btn-success">New</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Type</th>
                            <th scope="col">Departure_time</th>
                            <th scope="col">Arrival_time</th>
                            <th scope="col">Departure_id</th>
                            <th scope="col">Destination_id</th>
                            <th scope="col">Airline_id</th>
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="flight in flights" :key="flight.id">
                            <th scope="row">{{ flight.id }}</th>
                            <td>{{ flight.code }}</td>
                            <td>{{ flight.type }}</td>
                            <td>{{ flight.departure_time }}</td>
                            <td>{{ flight.arrival_time }}</td>
                            <td>{{ flight.departure_id }}</td>
                            <td>{{ flight.destination_id }}</td>
                            <td>{{ flight.airline_id }}</td>
                            <td>
                                <router-link :to='{name: "flightShow", params:{ id: flight.id }}' class="btn btn-info">Show</router-link>
                            </td>
                            <td>
                                <router-link :to='{name: "flightEdit", params:{ id: flight.id }}' class="btn btn-info">Edit</router-link>
                            </td>
                            <td>
                                <button type="button" @click="deleteFlight(flight.id)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"

export default {
    data(){
        return{
            flights: [],
        }
    },
    mounted(){
        this.getFlights()
    },
    methods:{
        getFlights(){
            axios.get('/api/flight')
                .then(response => {
                    this.flights = response.data
                    console.log(response.data)
                })
                .catch(error => {
                    this.flights = []
                })
        },
        deleteFlight(id){
            if(confirm("are you sure?")){
                axios.delete(`/api/flight/${id}`)
                    .then(response => {
                        this.getFlights()
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
}
</script>

<style>

</style>
