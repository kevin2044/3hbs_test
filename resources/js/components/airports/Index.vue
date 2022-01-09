<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <router-link :to="{ name: 'airportCreate' }" class="btn btn-success">New</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">City</th>
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="airport in airports" :key="airport.id">
                            <th scope="row">{{ airport.id }}</th>
                            <td>{{ airport.name }}</td>
                            <td>{{ airport.code }}</td>
                            <td>{{ airport.city }}</td>
                            <td>
                                <router-link :to='{name: "airportShow", params:{ id: airport.id }}' class="btn btn-info">Show</router-link>
                            </td>
                            <td>
                                <router-link :to='{name: "airportEdit", params:{ id: airport.id }}' class="btn btn-info">Edit</router-link>
                            </td>
                            <td>
                                <button type="button" @click="deleteairport(airport.id)" class="btn btn-danger">Delete</button>
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
            airports: [],
        }
    },
    mounted(){
        this.getairports()
    },
    methods:{
        getairports(){
            axios.get('/api/airport')
                .then(response => {
                    this.airports = response.data
                    console.log(response.data)
                })
                .catch(error => {
                    this.airports = []
                })
        },
        deleteairport(id){
            if(confirm("are you sure?")){
                axios.delete(`/api/airport/${id}`)
                    .then(response => {
                        this.getairports()
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
