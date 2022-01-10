<template>
  {{ searchedAndSortedPosts }}
    <div id="subscribers">
      <h1>Subsribers list</h1>
      <input type="text" class="search" placeholder="search" v-model="searchQuery">
      <br>
      <div class="sort">
        Sort:
      <select v-model="sort">
        <option value="date">by date</option>
        <option value="name">by name</option>
      </select>
      </div>
      <div class="providers" v-if="providers">
        <button 
        v-for="(provider, index) in getAllProviders"
        :key="index"
        @click="findByProviders(provider)" > {{ provider }} </button>
      </div>
        <table>
            <tr>
                <th>Subscriber email</th>
                <th>Action</th>
            </tr>
            <tr v-for="el in sortedData" :key="el.id">
                <td> {{ el.email }} </td>
                <td> <button class="delete" @click="deleteEmail(el.id)"><i class="far fa-trash-alt"></i></button> </td>
            </tr>
        </table>
    </div>
</template>

<script>
  import axios from 'axios';
  export default {
    name: 'Subscribers',
    data() {
        return {
            data: [],
            sort: 'date',
            searchQuery: '',
            providers: [],
            sortedData: []
        }
    },
    methods: {
      deleteEmail(id){
        axios.post('http://localhost:8081/magebit-test-assignment/api/delete.php', {
            id: id
          })
          .then((response) => {
            this.data = this.data.filter(elem => elem.id !== id);
          })
      },
      getProvider(str){
        let strsplitted1 = str.split('@');
        let strsplitted2 = strsplitted1[1].split('.');
        let provider = strsplitted2[0].charAt(0).toUpperCase() + strsplitted2[0].slice(1);
        return provider;
      },
      findByProviders(provider){
        this.sortedData = this.data.filter(subscriber => subscriber.email.toLowerCase().includes(provider.toLowerCase()));
      }
    },
    mounted() {
    axios
      .get('http://localhost:8081/magebit-test-assignment/api/read.php')
      .then((response) => {
          this.data = response.data
          
      })
    }, 
    computed: {
      
      orderedByName() {
        return this.data.sort((a, b) => {
          let fa = a.email.toLowerCase(), fb = b.email.toLowerCase();
            if (fa < fb) {
              return -1
            }
            if (fa > fb) {
              return 1
            }
            return 0
        })
      },
      orderedByDate(){
        return this.data.sort((a, b) => {
          let fa = a.id.toLowerCase(), fb = b.id.toLowerCase();
            if (fa < fb) {
              return -1
            }
            if (fa > fb) {
              return 1
            }
            return 0
        })
      },
      searchedAndSortedPosts(){
        let sortedArray = [];
            if(this.sort == 'date'){
            sortedArray = this.orderedByDate;
            } else if(this.sort == 'name'){
              sortedArray = this.orderedByName;
            }
            this.sortedData = sortedArray.filter(subscriber => subscriber.email.toLowerCase().includes(this.searchQuery.toLowerCase()));
        },
        getAllProviders(){
        this.data.forEach((elem => {
          this.providers.push(this.getProvider(elem.email));
        }));
        return [... new Set(this.providers)];
        }
      },
    }
</script>

<style lang="sass" scoped>
  #subscribers
    text-align: center
    padding: 20px
  table
    width: 100%
    margin: 0 auto
    border: 1px solid
  th
    font-weight: 700
  td
    width: 400px
    border: 1px solid
  .sort
    text-align: right
  .delete
    background-color: red
    color: white
    border: none
    padding: 5px 10px
    border-radius: 5px
    cursor: pointer
  .search
    width: 350px
    margin: 0 auto
    height: 25px
    line-height: 25px
  .providers
    float: left
    width: 500px
    button
      cursor: pointer
      background-color: silver
      color: #FFFFFF
      border: none
      border-radius: 5px
      width: 75px
      height: 25px
      margin-bottom: 20px
      margin-right: 10px
</style>