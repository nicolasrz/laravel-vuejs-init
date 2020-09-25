<template>
<div id="list">
    <div class="row">
        <input type="text" @input="searchContact($event)" placeholder="Search contact">
    </div>
    <div class="row">
        <span class="badge badge-light" @click="filterBy('friends')">Friends</span>
        <span class="badge badge-light" @click="filterBy('work')">Work</span>
        <span class="badge badge-light" @click="filterBy('family')">Family</span>
        <span class="badge badge-light" @click="filterBy('customers')">Customers</span>
    </div>
<div class="row" v-for="contact in contacts" :key="contact.id" @click="showContact(contact)">
      <p>  {{contact.prenom}}  <strong>{{contact.nom}}</strong></p>
      <p>{{contact.email}}</p>
</div>

</div>
</template>

<script>
import axios from "axios";
import Bus from "../../Bus.js";
export default {
    data(){
        return{
            contacts : [],
            initContact: []
        }
    },
    mounted(){
        this.getList();
         Bus.$on("destroy-contact", contact => {
             var index = this.contacts.indexOf(contact);
                this.contacts.splice(index, 1);
         });
    },
    methods:{
        async getList(){
              try{
                const response = await axios.get('/api/contacts');
                this.contacts = response.data;
                this.initContact = response.data;
            }catch(err){
                console.log(err);
            }
        },
        searchContact(e){
            console.log(e.target.value);
        },
        filterBy(source){
            this.contacts = this.initContact;
            const filtered = this.contacts.filter(contact => {
                if(contact.source === source){
                    return contact;
                }
            });
            this.contacts = filtered;
        },
        showContact(contact){
            Bus.$emit('show-contact', contact);
        }
    }
}
</script>

<style scoped>
.badge {
    cursor: pointer;
}
</style>