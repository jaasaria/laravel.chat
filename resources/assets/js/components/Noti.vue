<template>

	<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	          <i class="material-icons">notifications</i>
	          <span class="notification" v-if="all_nots_count">{{ all_nots_count }}</span>
	          <p class="hidden-lg hidden-md">Notifications</p>
	        </a>
	        <ul class="dropdown-menu">


            <li v-for="li in list">
              <a v-bind:class="{'unread-noti': !li.read_at }" :href ="'/notifications/info/' +  li.id " >{{ li.data['title'] }}</a>              
            </li>

            <li v-if="all_nots_count" class="text-center" style="background-color: #f7eef7"><a href="/notifications">-- View All 
            --</a></li>       

            <li v-else class="text-center" style="background-color: #f7eef7"><a>-- No Record Found 
            --</a></li>       

          
	        </ul>
	</li>

</template>



<script>

      // import Dropdown from './Dropdown.vue' // 
  
      export default {
            data: function () {
              return {
                  list: [],
              }
            },
            mounted() {
                  this.getNoti()
                  this.getDropdown()
                  this.listen()
            },
         
            props: ['id','url'],
            methods: {
                  listen() {

                        Echo.private('App.User.' + this.id)
                            .notification( (notification) => {
                                  this.$store.commit('add_not', notification)
                                  document.getElementById("noty_audio").play()
                                  toastr.success('Please read your new notification')
                            })

                        Echo.channel('News')
                            .notification( (notification) => {
                                  this.$store.commit('add_not', notification)
                                  document.getElementById("noty_audio").play()
                                  toastr.success('Please read your new notification')
                            })
                        // notes: use this event for testing under pusher.com
                        // Illuminate\Notifications\Events\BroadcastNotificationCreated

                  },
                  getNoti(){

                      axios.get('/notifications/server/news/unread')
                      .then((response) => {
                          response.data.forEach( (res) => {
                            this.$store.commit('add_not', res)
                          })
                      });
                  },

                  getDropdown(){
                      axios.get('/notifications/server/news/dropdown')
                      .then((response) => {

                        this.list = response.data;
                        console.log(this.list);

                      });
                  }


            },
            computed:{

              all_nots_count() {
                  return this.$store.getters.all_nots_count
              }
            }

      }
</script>

<style>
    .unread-noti{
        color: #ce4242 !important;
        font-weight: 550 !important;
    }
</style>

