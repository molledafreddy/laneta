<template>
    <div class="card mb-4 box-shadow">   
        <div class="row">
            <div class="col-md-4 current-chat-area">
                <div class="chat-search">
                    <input class="form-control" type="text" placeholder="Buscar un usuario..." v-model="first_name" v-on:click="getUsers">   
                </div>
                <template v-if="first_name!=''">
                    <h3>Busqueda</h3>
                    <ul class="list-group">                    
                        <li v-for="user in searchUser" class="list-group-item" v-on:click="getChats(user.id)">
                            <img :src="user.image" :alt="user.first_name">
                            <span>{{user.first_name}}</span>
                        </li>
                    </ul>  
                </template>     
                <h3>Chats</h3>          
                <ul class="list-group">                
                    <li v-for="(contact, index) in contacts" class="list-group-item" v-on:click="getChats(contact.id)">
                        <img :src="contact.image" :alt="contact.name">
                        <span>{{contact.name}}</span>
                    </li>
                </ul>      
            </div>
            <div class="col-md-8 current-chat">
                <template v-if="userChat.length > 0">
                    <div class="current-chat-header">
                        <span v-for="(r, index) in receiver" :value="r.id">{{r.first_name}}</span>
                    </div>
                    <div class="current-chat-area">
                        <ul v-for="(message, index) in userChat" class="media-list ">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media">
                                        <a class="pull-left" href="#" style="padding-right: 10px">
                                            <img class="media-object img-circle " :src="message.user.image" width="50px">
                                        </a>
                                        <div class="media-body">
                                            <span class="label label-warning">{{message.content}}</span>
                                            <br>
                                           <small class="text-muted">{{message.user.username }} | {{message.created_at }}</small>
                                            <hr>
                                        </div>
                                    </div>        
                                </div>
                            </li>
                        </ul>  
                    </div>
                    <div class="current-chat-footer">
                        <form class="form-horizontal" v-on:submit.prevent="sendMessage()" style="width: 100%;">
                            <div class="input-group">
                                <input v-for="(rec, index) in receiver" type="hidden" class="form-control" >
                                <input style="width: 680px;" type="text" class="form-control" v-model="createMessage" placeholder="Escribe un mensaje..." required="required">
                                <button class="btn btn-sm btn-info" type="submit" >
                                    <i class="icon dripicons-direction"></i>
                                </button>
                            </div>
                        </form>      
                    </div>
                </template>
                <template v-else>
                    <div class="current-chat-header">
                        <span >Seleccione un chat...</span>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
        //var app = document.querySelector('.app')
    export default {
        
        props:[
            'app_url',
            'auth',
            'user',
            'url'
        ],
        
        mounted() {
            console.log('Component mounted.')
        },
        created: function(){
            this.getContats();
        },
        data: function(){
            return {
                chat:{},
                receiver: [],
                contacts: [],
                userChat: [],
                users: [],
                text:'',
                dataSend:{
                    receive_id:'',
                    chat_id:'',
                    content:''
                },
                createMessage:'',
                commentCreateContent: '',
                commentEditContent:'',
                comment: '',
                first_name:'',
            }
        },
        
        methods: {
            /* Contacts */
            getContats: function(){
                var mv = this;
                
                axios.get('/api/listContact/').then(response => {
                    mv.contacts = response.data.contacts;            
                    
                }).catch(error => {                 
                    console.log(error);
                });
            },
            /* user all*/
            getUsers: function(){
                var mv = this;
                //?search=' + this.target
                axios.get('/api/listUsers').then(response => {
                    mv.users = response.data;            
                    console.log(mv.users);
                }).catch(error => {                 
                    console.log(error);
                });
            },
            
            /* Chats */
           getChats: function(id){
                var mv = this;
                this.id = id;

                axios.get('/api/userChatApi/'+id).then(response => { 
                    mv.users = [];
                    mv.userChat = response.data.chat;
                    mv.receiver = response.data.receiver;
                    mv.dataSend.receive_id = mv.receiver[0].id
                    if(mv.userChat !=0){
                        mv.dataSend.chat_id=response.data.chat[0].chat_id;
                        mv.first_name='';
                    }else{
                        mv.dataSend.chat_id = 0;
                    }
                                        
                }).catch(error => {                 
                    console.log(error);
                });
            },
            sendMessage: function(text){
                var mv = this;  

                if((mv.createMessage!='') && (mv.dataSend.receive_id!='')){
                
                    mv.dataSend.content= mv.createMessage;
                    
                    axios.post('/api/chat-send-messageApi/' ,  mv.dataSend
                    ).then(response => {
                        console.log(response);
                        console.log(response.data.message);
                        mv.getChats(mv.dataSend.receive_id);
                        mv.getContats();
                        mv.dataSend.receive_id='';
                        mv.dataSend.chat_id='';
                        mv.dataSend.content='';
                        mv.createMessage='';
                    }).catch(error => {
                        console.log(error);
                    });
                }
            },
            
        },
        computed:{
            searchUser: function(){
                return this.users.filter((user) => user.first_name.includes(this.first_name));
            }
        },
       
    }
</script>
