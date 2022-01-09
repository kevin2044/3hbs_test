<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <router-link :to="{ name: 'airlineCreate' }" class="btn btn-success">New</router-link>
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
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="airline in airlines" :key="airline.id">
                            <th scope="row">{{ airline.id }}</th>
                            <td>{{ airline.name }}</td>
                            <td>{{ airline.code }}</td>
                            <td>
                                <router-link :to='{name: "airlineShow", params:{ id: airline.id }}' class="btn btn-info">Show</router-link>
                            </td>
                            <td>
                                <router-link :to='{name: "airlineEdit", params:{ id: airline.id }}' class="btn btn-info">Edit</router-link>
                            </td>
                            <td>
                                <button type="button" @click="deleteAirline(airline.id)" class="btn btn-danger">Delete</button>
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
            airlines: [],
        }
    },
    mounted(){
        this.getAirlines()
    },
    methods:{
        getAirlines(){
            axios.get('/api/airline')
                .then(response => {
                    this.airlines = response.data
                })
                .catch(error => {
                    this.airlines = []
                })
        },
        deleteAirline(id){
            if(confirm("are you sure?")){
                axios.delete(`/api/airline/${id}`)
                    .then(response => {
                        this.getAirlines()
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
