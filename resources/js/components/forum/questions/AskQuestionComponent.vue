<template lang="">
   <v-container>
       <v-form
            lazy-validation
        >

        <v-text-field
            type="text"
            v-model="form.question_title"
            label="Title"
            required
        ></v-text-field>
        <v-select
          :items="categories"
          item-text="name"
          item-value="id"
          v-model="form.category_id"
          label="Select category"
          solo
        ></v-select>

        <v-textarea
            v-model="form.question_body"
            label="Ditails"
            auto-grow
        ></v-textarea>

        <v-btn
            elevation="2"
            type="submit"
        >Create Question</v-btn>
      </v-form>
 </v-container>
</template>
<script>

export default {
    data() {
        return {
            form: {
                category_id:'',
                question_title: '',
                question_body: ''
            },
            categories: []
        }
    },
    created(){
        axios.get('/api/v1/categories')
             .then((response) => {
                this.categories = response.data.data.categories;
                this.categories.map((category)=>{
                    return (
                        this.categories.push(category.name)
                    )
                })
             })
             .catch((error)=>{
                 console.log(error)
             })
    }
}
</script>
<style lang="">

</style>