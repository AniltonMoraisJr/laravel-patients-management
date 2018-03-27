<template>
    <div>
        <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
         <h1>Detail Patient</h1>
        </div>
        <div class="container">
            <back-button></back-button>
            <br/>
            <br/>
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">    
                                <label for="inputFullName">Full Name</label>
                                <p id="inputFullName">{{ full_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail">Email</label>
                                <p id="inputEmail">{{ email }}</p>
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="inputBirthday">Birthday</label>
                                <p id="inputBirthday">{{ birthday }}</p>
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="inputGenre">Genrer</label>
                                <p id="inputGenre">{{ genre }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputZipCode">Zip Code</label>
                                <p id="inputZipCode">{{ zip_code }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress1">Address 1</label>
                                <p id="inputAddress1">{{ address1 }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress2">Address 2</label>
                                <p id="inputAddress2">{{ address2 }}</p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputCountry">Country</label>
                                <p id="inputCountry">{{ country }}</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <p id="inputState">{{ state }}</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <p id="inputCity">{{ city }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputPhone">Phone</label>
                                <p id="inputPhone">{{ phone }}</p>
                            </div>
                        </div>
                </div>
            </div>            
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return {
                full_name: "",
                email: "",
                birthday: "",
                genre: "",
                address1: "",
                address2: "",
                country: "",
                state: "",
                city: "",
                zip_code: "",
                phone: ""
            }
        },
        created(){
            this.getData();
        },
        watch: {
            // call again the method if the route changes
            '$route': 'getData'
        },
        methods: {
            getData(){
                let id = this.$route.params.id;
                axios.get('http://localhost:8000/api/patients/' + id)
                    .then((res) => {
                        this.full_name = res.data[0].full_name;
                        this.email =  res.data[0].email;
                        this.birthday = res.data[0].birthday;
                        this.genre = res.data[0].genre;
                        this.address1 = res.data[0].address_one;
                        this.address2 = res.data[0].address_two;
                        this.country = res.data[0].country;
                        this.state = res.data[0].state;
                        this.city = res.data[0].city;
                        this.zip_code = res.data[0].zip_code;
                        this.phone = res.data[0].phone;
                        console.log(res.data[0].full_name);
                    })
                    .catch((error) => console.error(error));
            }

        }
    }
</script>