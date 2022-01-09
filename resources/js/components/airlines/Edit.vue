<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form @submit.prevent="update">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="airline.name">
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" v-model="airline.code">
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
            airline: {
                name: '',
                code: '',
            }
        }
    },
    mounted(){
        this.getAirline()
    },
    methods:{
        update(){
            axios.put(`/api/airline/${this.$route.params.id}`, this.airline)
                .then(response => {
                    this.$router.push({name: 'airline'})
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getAirline(){
            axios.get(`/api/airline/${this.$route.params.id}`)
                .then(response => {
                    const { name, code } = response.data
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
