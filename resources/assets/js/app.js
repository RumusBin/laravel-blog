

require('./bootstrap');

window.Vue = require('vue');

let url = window.location.href;
let pageNumber = url.split('=')[1];

Vue.component('Posts', require('./components/Posts.vue'));

const app = new Vue({
    el: '#app',
    data:{
      blog:{}
    },
    mounted(){
        axios.post('/getPosts', {'page': pageNumber})
            .then(response=>{
                this.blog = response.data.data
            })
            .catch(function(error){
                console.log(error);
            })
    }
});
