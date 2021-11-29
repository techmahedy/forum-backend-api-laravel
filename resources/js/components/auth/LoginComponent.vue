<template>
 <v-container>
       <v-form
            lazy-validation
            @submit.prevent="login"
        >

        <v-text-field
            type="email"
            v-model="form.email"
            label="E-mail"
            required
        ></v-text-field>

        <v-text-field
            type="password"
            v-model="form.password"
            label="Password"
            required
        ></v-text-field>

        <v-btn
            elevation="2"
            type="submit"
        >Login</v-btn>
      </v-form>
 </v-container>
</template>
<script>
export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods:{
        login(){
           Helper.login(this.form);
        }
    }
}
</script>
<style lang="">
    
</style>