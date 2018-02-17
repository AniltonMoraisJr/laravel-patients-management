<template>
    <div>
        <div class="row">
            <h1>Patients component</h1>
        </div>
        <div class="row">
            <router-link :to="{name: 'new_patient'}" class="btn btn-primary">Add new Patient</router-link>
        </div>
        <br/>
        <div class="row" v-if="patients.length">
            <div class="table-responsive">
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL</th>
                            <th>BIRTHDAY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="patient in patients">
                            <td>{{ patient.id }}</td>
                            <td>{{ patient.full_name }}</td>
                            <td>{{ patient.email }}</td>
                            <td>{{ patient.birthday | moment("DD/MM/YYYY") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="pagination">
                <button class="btn btn-default" @click="fetchStories(pagination.prev_page_url)"
                        :disabled="!pagination.prev_page_url">
                    Previous
                </button>
                <span>Page {{ pagination.current_page }} of {{ pagination.last_page }}</span>
                <button class="btn btn-default" @click="fetchStories(pagination.next_page_url)"
                        :disabled="!pagination.next_page_url">Next
                </button>
            </div>
            
        </div>
        <p v-else>No patients found !</p>
    </div>
</template>
<script>
    export default{
        data () {
            return {
                patients: [],
                pagination: {}
            }
        },
        created () {
            let url = "http://localhost:8000/api/patients";
            axios.get(url)
                .then(response => {
                    this.patients = response.data.data;
                    this.makePagination(response.data)
                })
                .catch(error => console.log(error));
        },
        computed: {

        }, 
        methods: {
            fetchStories: function (page_url) {
                axios.get(page_url)
                    .then((response) => {
                        this.makePagination(response.data)
                        this.patients = response.data.data
                    });
            },
            makePagination: function(data){
                let pag = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
                this.pagination = pag
            }
        }
    }
</script>