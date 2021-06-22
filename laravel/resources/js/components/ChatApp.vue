<template>
   <div class="container-chat clearfix">
    <div class="people-list" id="people-list">
      <div class="search">
        <input type="text" placeholder="search" />
        <i class="fa fa-search"></i>
      </div>
      <ul class="list">
          <!-- {{userList}} -->
          <li @click.prevent="selectUser(user.id)" class="clearfix" v-for="user in userList" :key="user.id">
            <img :src="'upload/images/' + user.imageUser" alt="avatar"  width="50px" />
          <div class="about">
            <div class="name">{{user.firstName}} {{user.lastName}}</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
        
        
        <!-- <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_03.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Mike Thomas</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li> -->
        
        
        
        
      </ul>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
        
        <div class="chat-about">
           <div v-if="userMessage.user" class="chat-with">{{userMessage.user.firstName}}</div>
        </div>
        <i class="fa fa-star"></i><ul class="nav nav-tabs">
               
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">...</a>
                  <div class="dropdown-menu">
                    <a @click.prevent="deleteAllMessage" class="dropdown-item" href="#">Delete All Message</a>
                  </div>
                </li>
               
              </ul>
      </div> <!-- end chat-header -->
      
      <div class="chat-history" v-chat-scroll>
        <ul>
          <li class="clearfix"  v-for="message in userMessage.messages" :key="message.id">
            <div class="message-data align-right ">
              <span class="message-data-time" >{{message.created_at|timeformat}}</span> &nbsp; &nbsp;
              <span class="message-data-name" >{{message.user.firstName}}</span> <i class="fa fa-circle me"></i>
               <ul class="nav nav-tabs">
               
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">...</a>
                  <div class="dropdown-menu">
                    <a @click.prevent="deleteSingleMessage(message.id)" class="dropdown-item" href="#">Delete Message</a>
                  </div>
                </li>
               
              </ul>
            </div>
            <div :class="`message  float-right ${message.user.id==userMessage.user.id ? 'other-message' : 'my-message'}`">
             {{message.message}}
            </div>
          </li>
          
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <textarea @keydown.enter="sendMessage" v-model="message" name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button>Send</button>

      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->
</template>

<script>
export default{ 
 mounted(){
 this.$store.dispatch('userList');
    },
    data(){
    
    return{
       message:'',
       typing:'' ,
       users:[],
       online:''
     
    }

    },
    computed:{
    userList(){
    return  this.$store.getters.userList
    },
     userMessage(){
        return  this.$store.getters.userMessage
    }
    
  },
    created(){

    },
    methods:{
      selectUser(userId){
       this.$store.dispatch('userMessage',userId);
    },
    sendMessage(e){
        // alert(this.message);
      e.preventDefault();
      if(this.message!=''){
        axios.post('/sendmessage',{message:this.message,user_id:this.userMessage.user.id})
        .then(response=>{
          this.selectUser(this.userMessage.user.id);
         
        })
        this.message = '';
      }
    },
     deleteSingleMessage(messageId){
      axios.get(`/deletesinglemessage/${messageId}`)
      .then(response=>{
        this.selectUser(this.userMessage.user.id)
      })
    },
    deleteAllMessage(){
        axios.get(`/deleteallmessage/${this.userMessage.user.id}`)
      .then(response=>{
        this.selectUser(this.userMessage.user.id)
      })
    },
   
    }
    
}

</script>

<style>
 .people-list ul{overflow-y: scroll!important}
</style>