<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form @submit.prevent="create">
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
    methods:{
        create(){
            axios.post('/api/airline', this.airline)
                .then(response => {
                    this.$router.push({name: 'airline'})
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
