<template>

    <div class="post-preview">
        <a href="slug">
            <h2 class="post-title">
                {{title}}
            </h2>
            <h3 class="post-subtitle">
                 {{sub_title}}
            </h3>
        </a>
        <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            Created at {{created_at}}
            <a href="" @click.prevent="likeIt">
                <small>{{likeCount}}</small>
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </a>

        </p>
    </div>
</template>

<script>
    export default {
        data(){
            return {likeCount:0}
        },
        props:[
            'title','sub_title', 'created_at', 'postId', 'login', 'likes'
        ],
        created(){
          this.likeCount = this.likes
        },
        methods:{
            likeIt(){
                if(this.login){
                    axios.post('/saveLike',{
                        id : this.postId
                    }).then(
                        response => {
                            this.likeCount += 1;
                        }
                    ).catch();
                }else{
                    window.location = 'login';
                }

            }

        }
    }
</script>
