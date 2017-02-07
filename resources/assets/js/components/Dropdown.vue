<template>

  <div>
        <li v-for="li in list">
          <a href="/notifications/info/">{{ li.title }}</a>
        </li> 
  </div>
   
</template>

<script>
      export default {
            data: function () {
              return {
                  list: [],
              }
            },
            mounted() {
              this.getNoti()
            },
            methods: {
                  getNoti(){
                      axios.get('/notifications/server/news/dropdown')
                      .then((response) => {

                        this.list = response.data;
                        console.log(this.list);

                      });
                  }//end of getNoti


            }
      }
</script>