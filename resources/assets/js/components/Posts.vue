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
            <a href="">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </a>

        </p>
    </div>
</template>

<script>
    export default {
        props:[
            'title','sub_title', 'created_at'
        ]
    }
</script>
