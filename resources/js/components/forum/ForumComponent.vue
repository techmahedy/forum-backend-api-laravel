<template lang="">
    <v-container>
        <v-layout row wrap>
           <v-flex xs8>
              <question v-for="question in questions" :key="question.id" :data="question"/>
           </v-flex>
             Sidebar
        </v-layout>
    </v-container>
</template>
<script>

import question from './questions/QuestionComponent';

export default {
    components: {
        question
    },
    data(){
        return {
            questions: {}
        }
    },
    created(){
        axios.get('/api/v1/questions')
             .then((response) => {
                this.questions = response.data.data.questions
             })
             .catch((error)=>{
                 console.log(error)
             })
    }
}
</script>
