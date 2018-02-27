<template>
    <div>
        <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
         <h1>New Patient</h1>
        </div>
        <div class="container">
            <router-link :to="{name: 'patients'}" class="btn btn-secondary float-left">Back</router-link>
            <br/>
            <br/>
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="validateBeforeSubmit">
                        <div class="row">
                            <div class="form-group col-md-12">    
                                <label for="inputFullName">Full Name</label>
                                <input type="text" id="inputFullName" :class="{'form-control is-invalid': errors.has('full_name'), 'form-control': true }"  
                                    v-validate="'required|min:3'" name="full_name" v-model="full_name"/>
                                <p class="text-danger" v-if="errors.has('full_name')">{{ errors.first('full_name') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail">Email</label>
                                <input type="email" id="inputEmail" :class="{'form-control is-invalid': errors.has('email'), 'form-control': true }" 
                                    v-validate="'required|email'" name="email" v-model="email"/>
                                <p class="text-danger" v-if="errors.has('email')">{{ errors.first('email') }}</p>
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="inputBirthday">Birthday</label>
                                <input type="text" id="inputBirthday" :class="{'form-control is-invalid': errors.has('birthday'), 'form-control': true }" 
                                    v-model="birthday" name="birthday" v-validate="'required'" v-mask="'####/##/##'" placeholder="YYYY/MM/DD"/>
                                <p class="text-danger" v-if="errors.has('birthday')">{{ errors.first('birthday') }}</p>
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="inputGenre">Genrer</label>
                                <select id="inputGenre" v-model="genre" class="form-control">
                                <option value="M">M</option>
                                <option value="F">F</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputZipCode">Zip Code</label>
                                <input type="text" id="inputZipCode" class="form-control" name="zip_code" v-model="zip_code"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress1">Address 1</label>
                                <input type="text" id="inputAddress1" class="form-control"  name="address1" v-model="address1"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" id="inputAddress2" class="form-control"  name="address2" v-model="address2"/>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputCountry">Country</label>
                                <input type="text" id="inputCountry" class="form-control"  name="country" v-model="country"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" id="inputState" class="form-control"  name="state" v-model="state"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" id="inputCity" class="form-control"  name="city" v-model="city"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputPhone">Phone</label>
                                <input type="text" id="inputPhone" :class="{'form-control is-invalid': errors.has('phone'), 'form-control': true }" name="phone" v-model="phone" v-validate="'required'"/>
                                <p class="text-danger" v-if="errors.has('phone')">{{ errors.first('phone') }}</p>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</template>
<script>
    import swal from 'sweetalert2'
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
        methods: {
            validateBeforeSubmit(e) {
                this.$validator.validateAll();

                if (!this.errors.any()) {
                    this.submitForm()
                }
            },
            submitForm(){
                axios.post('http://localhost:8000/patients', {
                    full_name: this.full_name,
                    email: this.email,
                    birthday: this.birthday,
                    genre: this.genre,
                    address_one: this.address1,
                    address_two: this.address2,
                    country: this.country,
                    state: this.state,
                    city: this.city,
                    zip_code: this.zip_code,
                    phone: this.phone
                }).then((res) => {
                    swal("Good job!", "You create a patient!", "success");
                    console.log(res);
                }).catch((error) => console.error(error));
            }

        }
    }
</script>