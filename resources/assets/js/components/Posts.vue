<template>
    <div>
        <div :class="{'can-scroll': scrollableContainer}" ref="scrollContainer">
            <div class="col-md-12" v-for="post in posts">
                <div class="card card-notice mb-4 box-shadow">
                    <div class="card-header">
                        <p class="card-title">{{ post.title }}</p>
                        <!-- aquí guardamos el último id, hay muchas formas de hacer esto --> 
                        <div class="lastId" style="display:none" value="lastID=post.id"></div>
                    </div>
                    <div v-if="post.media.length > 0" class="row">
                        <div v-for="image in post.media" :class="'photo col-md-'+(12/post.media.length)">
                            <img class="card-img-top img-fluid" :src="'/img/media/'+image.media" :title="post.title" style="height: 100%; width: 100%;">
                        </div>
                    </div>
                    <img v-else class="card-img-top" :src="'https://lorempixel.com/1200/480/?' + post.id" :title="post.title">
                    <div class="card-body">
                        <div class="notice-options">
                            <div class="row text-center">
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                        <button v-if="auth == 1" type="button" id="like" class="btn btn-icon" title="Me gusta" v-on:click.prevent="postLike(post.id)">
                                            <span class="icon dripicons-heart" :class="(post.likes.length> 0) ? 'color-red' : 'color-icon'" data-glyph="heart"></span>
                                            {{post.likes.length}}
                                        </button> 
                                        <button v-else class="btn btn-icon" title="Me gusta" data-toggle="modal" data-target="#login">                                 
                                            <span class="icon dripicons-heart" :class="(post.likes.length> 0) ? 'color-red' : 'color-icon'" data-glyph="heart"></span>
                                            {{post.likes.length}}
                                        </button>   
                                </div>
                                <div class="col-md-2">
                                    <i class="icon dripicons-preview"></i> 0
                                </div>  
                                <div class="col-md-2">
                                    <i class="icon dripicons-message"></i> {{post.comments.length}}
                                </div>                                
                                <div class="col-md-2">                                
                                    <button class="btn btn-icon" title="Link" data-container="body" data-toggle="popover" data-placement="left" :data-content="post.slug">
                                        <i class="icon dripicons-link"></i> 
                                    </button>
                                </div>
                                <div class="col-md-2"> 
                                    <a class="btn btn-icon" href="#" title="Compartir" data-toggle="modal" data-target="#socialShare" v-on:click.prevent="postShare(post)">
                                        <i class="icon dripicons-media-shuffle"></i> 
                                    </a>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>  
                        <hr>
                        <transition name="custom" enter-active-class="animated bounceInLeft" leave-active-class="animated bounceOutRight">
                            <div v-show="post.id == postShow">
                                <div class="notice-user mb-2">
                                    <img class="rounded-circle inline-block mr-2" width="40" height="40" :src="post.user.image" :alt="post.user.username">
                                    <a class="btn btn-link" :href="post.user.username"> 
                                        {{ post.user.first_name +' '+ post.user.last_name  }} 
                                    </a>
                                    <small class="text-muted inline-block">{{ post.created_at }}</small>
                                </div>
                                <div class="notice-text">                                
                                    {{ post.description }}
                                </div>
                                <div class="notice-comments">
                                    <ul class="list-unstyled">
                                        <li class="comment"  v-for="element in comments">
                                            <div class="comment-header">
                                                <template v-if="element.user.image == null">
                                                    <img src="/img/user-gray.svg" alt="User image">
                                                </template>
                                                <template v-else>
                                                    <img :src="element.user.image" alt="User image">
                                                </template>
                                            </div>
                                            <div class="comment-body">
                                                <a :href="'/'+element.user.username">{{ element.user.username }}</a> 
                                                <template v-if="comment == element.id"> 
                                                    <input type="text" v-model="commentEditContent" maxlength="250" min="3" style="display: inline-block;">
                                                    <button class="btn-icon" type="button" v-on:click="updateComment(element.id)">
                                                        <i class="icon dripicons-checkmark mini"></i>
                                                    </button>
                                                    <button class="btn-icon" type="button" v-on:click="comment = ''">
                                                        <i class="icon dripicons-cross mini"></i>
                                                    </button>
                                                </template>
                                                <template v-else>                                   
                                                    <span class="text-content">{{ element.content }}</span>
                                                    
                                                        <button class="btn-icon" type="button" v-on:click="editComment(element.id, element.content)">
                                                            <i class="icon dripicons-pencil mini"></i>
                                                        </button>
                                                        <button class="btn-icon" type="button" v-on:click="destroyComment(element.id, post.id)">
                                                            <i class="icon dripicons-trash mini"></i>
                                                        </button>
                                                    
                                                </template>
                                            </div>
                                            <button type="button" class="btn btn-icon like" title="Me gusta" v-on:click="likeComment(element.id)"> 
                                                <span class="icon dripicons-heart" :class="(element.likes.length > 0) ? 'color-red' : 'color-gray'" data-glyph="heart"></span>
                                                {{element.likes.length}}
                                            </button> 
                                        </li> 
                                        <li class="text-center" v-show="loading">
                                            <i class="icon dripicons-loading"></i>
                                        </li>
                                    </ul>
                                    <form class="form-horizontal" v-on:submit.prevent="storeComment(post.id)">
                                        <div class="input-group">
                                            <input type="text" class="form-control" v-model="commentCreateContent" placeholder="Escribe un comentario..." required="required">

                                            <div class="input-group-append">
                                                <button v-if="auth == 1" class="btn btn-dark" type="submit" >
                                                    <i class="icon dripicons-direction"></i>
                                                </button>
                                                <button  v-else class="btn btn-dark" title="Iniciar sesion" data-toggle="modal" data-target="#login" data-dismiss="modal" aria-label="Close">  
                                                    <i class="icon dripicons-direction"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>   
                            </div>    
                        </transition> 
                        <div class="text-center mt-4">
                            <button  class="btn btn-dark btn-sm btn-show" v-on:click.prevent="postToggle(post.id)">
                                <i class="icon dripicons-preview"></i> 
                                Ver noticia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <mugen-scroll
                class="mugen-scroll"
                :handler="fetchData"
                :should-handle="!loading"
                :scroll-container="scrollableContainer && 'scrollContainer'">
                <div v-if="!posts.length">
                loading.... <span class="loading dots"></span>
                <img class="card-img-top" :src="'loading.gif'">
                </div>               
            </mugen-scroll>
        </div>
        <div class="modal fade" id="socialShare" tabindex="-1" role="dialog" aria-labelledby="socialShareLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <a class="btn btn-sm btn-show" :href="facebook" title="Compartir en Facebook" target="_black" style="background-color: #4267b2; border-color: #4267b2; color: #fff;">
                            Facebook
                        </a>
                        <a class="btn btn-dark btn-sm btn-show" :href="twitter" title="Compartir en Twitter" data-size="large" target="_black" style="background-color: #1b95e0;  border-color: #1b95e0; color: #fff;">
                            Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MugenScroll from 'vue-mugen-scroll'
   
    export default {
        props:[
            'url',
            'app_url',
            'auth',
            'auth_user',
            'scrollableContainer'
        ],
        created: function(){
            this.getPosts();
        },
        data: function(){
            return {
                posts: [],
                post: '',
                postShow: '',
                comments: [],
                commentCreateContent: '',
                commentEditContent:'',
                comment: '',
                postEditData: {
                    title: '',
                    description: '',
                    user: '',
                    status: false,
                },
                facebook: '',
                twitter: '',
                lastId:10,
                image:'',
                loading: false,
                count: 0,
            }
        },
        methods: {
            /*infinite scroll*/
            fetchData() {
                var mv = this;
                mv.loading = true
                console.log(mv.lastId);
              axios.get('/api/scrollApi/'+mv.lastId).then( response => {
                     mv.posts = [...mv.posts, ...response.data.posts]
                     mv.count++
                     mv.lastId=0;
                     mv.lastId = response.data.lastId;
                     mv.loading = false;
                 
              }).catch(error => {                 
                    console.log(error);
                });
            },            
            /* Posts */
            getPosts: function(){
                var mv = this;
               
                axios.get(mv.url).then(response => {
                    mv.posts = response.data.posts;
                   // mv.lastId=0;
                    mv.lastId = response.data.lastId;
                    console.log(mv.lastId);           
                    
                }).catch(error => {                 
                    console.log(error);
                });
            },
            postToggle: function(id){
                if(id == this.postShow){
                    this.postShow = '';
                }else{
                    this.postShow = id;
                    this.getComments(id);
                }
            },
            postLike: function(post){
                var mv = this;
                axios.post('/api/postsApi/' + post + '/like', {
                }).then(response => {
                    mv.getPosts();
                    console.log('Like post' + post);
                }).catch(error => {
                    console.log(error);
                });
            }, 
            postShare: function(post){
                var mv = this;
                mv.twitter =  'http://twitter.com/intent/tweet?text='+post.title+'&url='+mv.app_url+'/landing/'+post.slug;
                mv.facebook = 'http://www.facebook.com/sharer.php?u='+mv.app_url+'/landing/'+post.slug;
            }, 
            postEdit: function(post){
                this.postEditData.status = true;
                this.postEditData.title = post.title;
                this.postEditData.description = post.description;
                this.postEditData.user = post.user_id;
                this.postShow = post.id;
                console.log(this.postEditData.status);
            },
            postUpdate: function(post){
                axios.put('/api/postsApi/'+post, {
                    title: this.postEditData.title,
                    description: this.postEditData.description,
                }).then(response => {
                    this.getPosts();
                    this.postDiscard();
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                });
            },
            postDiscard: function(){
                this.postEditData.title = '';
                this.postEditData.description = '';
                this.postEditData.status = false;
            },
            /* Coments */
            getComments: function(post){
                var mv = this;
                axios.get('/api/commentsApi/'+post)
                .then(response => {
                    mv.comments = [];
                    mv.comments = response.data;
                    console.log('Lista de comentarios');
                    console.log(mv.comments);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            storeComment: function(post){
                var mv = this;
                mv.loading = true;
                axios.post('/api/commentsApi/', {
                    post_id: post,
                    content: mv.commentCreateContent,
                }).then(response => {
                    mv.getComments(post);
                    mv.getPosts();
                    mv.commentCreateContent = '';
                    mv.loading = false;
                    console.log('Create comment');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            editComment: function(comment, content){
                this.comment = comment;
                this.commentEditContent = content;
            },
            updateComment:function(comment){
                var mv = this;
                mv.loading = true;
                axios.put('/api/commentsApi/'+comment, {
                    content: mv.commentEditContent
                }).then(response => {
                    mv.getComments(mv.post);
                    mv.commentEditContent = '';
                    mv.comment = '';
                    mv.loading = false;
                    console.log('Like ' + mv.post);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            destroyComment:function(comment, post){
                var mv = this;
                mv.loading = true;
                axios.delete('/api/commentsApi/'+comment)
                .then(response => {
                    mv.getComments(post);
                    mv.getPosts();
                    mv.loading = false;
                    console.log('Destroy comment ' + comment);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            /* Likes */
            likeComment: function(comment){
                var mv = this;
                mv.loading = true;
                axios.post('/api/commentsApi/'+comment+'/like', {
                }).then(response => {
                    mv.getComments(mv.post);
                    mv.loading = false;
                    console.log('Like ' + comment);
                }).catch(function (error) {
                    console.log(error);
                });
            }, 
        },
        components: {
            MugenScroll,
        },
    }
</script>

