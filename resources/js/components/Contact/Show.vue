<template>
    <div id="show-contact" v-if="contact.nom">
        <div class="row">
            <button @click="destroy(contact)" v-if="editMode">delete</button>
            <button @click="cancel" v-if="editMode" >cancel</button>
            <button @click="edit">edit</button>
            <button @click="save(contact)" v-if="editMode">save</button>
        </div>
        <div class="row">
            <div class="col-4">Photo</div>
            <div class="col-8">{{contact.nom}} {{contact.prenom}} from {{contact.company}}</div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <label>email:</label>
            </div>
            <div class="col">
                <input type="email" v-model="contact.email" :readonly="!editMode">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Mobile Phone:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.mobile_phone" :readonly="!editMode">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Work phone:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.work_phone" :readonly="!editMode">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label>Street:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.street" :readonly="!editMode">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Postal code:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.zipcode" :readonly="!editMode">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>City:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.city" :readonly="!editMode">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Other info:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.other" :readonly="!editMode">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Notes:</label>
            </div>
            <div class="col">
                <input type="text" v-model="contact.notes" :readonly="!editMode">
            </div>
        </div>
    </div>
</template>


<script>
import Bus from "../../Bus.js";
import axios from "axios";
export default {
    data(){
        return{
            initContact: {},
            contact: {},
            editMode : false
        }
    },
    mounted(){
         Bus.$on("show-contact", contact => {
             this.contact = contact;
             this.initContact = contact;
         });
    },
    methods:{
        edit(contact){
            this.editMode = true;
            this.contact = this.initContact;
        },
        cancel(){
            this.editMode = false;
        },
        async save(contact){
             try {
                const response = await axios.patch("api/contacts/" + contact.id, contact);
                console.log(this.contact);
                if(response.status == 204){
                    alert('Update ok');
                }
            } catch (error) {
                console.log(error);
            }
        },
        async destroy(contact) {
      try {
            const response = await axios.delete("api/contacts/" + contact.id);
            if (response.status == 200) {
                this.contact = {};
                Bus.$emit('destroy-contact', contact);
            }
        } catch (error) {
            console.log(error);
        }
    },
    }
}
</script>