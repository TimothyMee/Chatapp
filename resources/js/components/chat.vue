<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Chats</div>

                    <div class="card-body">
                        <span v-for="message in completeMessages" class="col-md-12">
                            <h4 v-if="message.user == 'Me'" style="float: left"> {{message.chat}}</h4>
                            <h4 v-else="" style="float: right"> {{message.chat}}</h4>
                            <br>
                        </span>


                        <br><br><br><input type="text" v-model="message">
                        <button class="btn btn-success" @click="sendMessage()">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                message:'',
                completeMessages:[]
            }
        },

        methods:{
          sendMessage(){
              axios.post('/messages', {message: this.message})
                  .then(response => {
                      let myMessage = {
                          chat: this.message,
                          user: 'Me'
                      }
                      this.completeMessages.push(myMessage);
                    console.log(response);
                  })
                  .catch(error =>{
                      console.log(error);
                  });


              console.log(this.message);
          },

            listening(){
                window.Echo.private('chat')
                    .listen('ChatEvent', (e) =>{
                     this.completeMessages.push(e);
                    });
            }

        },

        mounted() {
            console.log('Component mounted.')
            this.listening();

        }
    }
</script>
