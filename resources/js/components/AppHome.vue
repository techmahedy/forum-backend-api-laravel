<template lang="">
    <div>
        <toolbar/>
         <router-view></router-view>
        <app-footer/>
    </div>
</template>
<script>
import toolbar from './ToolBar';
import AppFooter from './AppFooter';

export default {
    components:{
        toolbar,
        AppFooter
    }
}
</script>
<style lang="">
    
</style>