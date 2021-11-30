<template lang="">
    <div>
        <show-question :data="question"/>
    </div>
</template>
<script>

import ShowQuestion from './ShowQuestionComponent.vue';

export default {
    components: {
        ShowQuestion
    },
    data() {
        return {
            question: {}
        }
    },
    created(){
        axios.get(`/api/v1/question/${this.$route.params.slug}`)
             .then((response) => {
                this.question = response.data.data.question
             })
             .catch((error)=>{
                 console.log(error)
             })
    }
}
</script>
<style lang="">
    
</style>